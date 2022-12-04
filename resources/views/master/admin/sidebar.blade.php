<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li @if($url == 'home') class="active" @else class="nav-item" @endif>
                <a  href="{{route('home')}}">
                    <i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#">
                    <i class="feather icon-settings"></i><span class="menu-title" data-i18n="Setup">Setup</span>
                </a>
                <ul class="menu-content">
{{--                    <li @if($url == 'setting') class="active"  @endif>--}}
{{--                        <a href="{{route('setting')}}" data-i18n="Setting">POS Setting</a>--}}
{{--                    </li>--}}
                    <li @if($url == 'managePOS') class="active"  @endif>
                        <a href="{{route('managePOS')}}" data-i18n="Setting">Manage POS</a>
                    </li>
                    <li @if($url == 'manageMail') class="active"  @endif>
                        <a href="{{route('manageMail')}}" data-i18n="Setting">Mail Configuration</a>
                    </li>
                    <li @if($url == 'ingredient_category.index') class="active"  @endif>
                        <a href="{{route('ingredient_category.index')}}" data-i18n="Setting">Ingredient Category</a>
                    </li>
                    <li @if($url == 'ingredientUnit.index') class="active"  @endif>
                        <a href="{{route('ingredientUnit.index')}}" data-i18n="Setting">Ingredient Units</a>
                    </li>
                    <li @if($url == 'ingredient.index') class="active"  @endif>
                        <a href="{{route('ingredient.index')}}" data-i18n="Setting">Ingredient</a>
                    </li>
                    <li @if($url == 'menuCategory.index') class="active"  @endif>
                        <a href="{{route('menuCategory.index')}}" data-i18n="Food Menu Category">Food Menu Category</a>
                    </li>
                    <li @if($url == 'menu.index' || $url == "menu.create" || $url == "menu.edit") class="active"  @endif>
                        <a href="{{route('menu.index')}}" data-i18n="Food Menu">Food Menu</a>
                    </li>
                    <li @if($url == 'customer.index') class="active"  @endif>
                        <a href="{{route('customer.index')}}" data-i18n="Food Menu">Customers</a>
                    </li>
                    <li @if($url == 'expense_item.index') class="active"  @endif>
                        <a href="{{route('expense_item.index')}}" data-i18n="Food Menu">Expense Item</a>
                    </li>
                    <li @if($url == 'modifiers') class="active"  @endif>
                        <a href="{{route('modifiers')}}" data-i18n="Food Menu">Modifier</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="feather icon-briefcase"></i><span class="menu-title" data-i18n="Inventory">Inventory</span>
                </a>
                <ul class="menu-content">
                    <li @if($url == 'purchase.index') class="active"  @endif>
                        <a href="{{route('purchase.index')}}" data-i18n="">Purchase</a>
                    </li>
                    <li @if($url == 'stock_adjustment.index') class="active"  @endif>
                        <a href="{{route('stock_adjustment.index')}}" data-i18n="">Stock Adjustment</a>
                    </li>
                    <li @if($url == 'waste.index') class="active"  @endif>
                        <a href="{{route('waste.index')}}" data-i18n="">Waste</a>
                    </li>
                </ul>
            </li>

{{--            <li class=" nav-item">--}}
{{--                <a href="">--}}
{{--                    <i class="feather icon-printer"></i><span class="menu-title" data-i18n="Invoice Details">Invoice Details</span>--}}
{{--                </a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li @if($url == 'invoice_details') class="active"  @endif>--}}
{{--                        <a href="{{route('invoice_details')}}" data-i18n="Invoice">Invoice</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'invoice_search') class="active"  @endif>--}}
{{--                        <a href="{{route('invoice_search')}}" data-i18n="Search">Search</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'return_invoice') class="active"  @endif>--}}
{{--                        <a href="{{route('return_invoice')}}" data-i18n="Return">Return</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'return_search') class="active"  @endif>--}}
{{--                        <a href="{{route('return_search')}}" data-i18n="Search">Search</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'invoice_due') class="active"  @endif>--}}
{{--                        <a href="{{route('invoice_due')}}" data-i18n="Due">Due</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class=" nav-item">--}}
{{--                <a href="">--}}
{{--                    <i class="feather icon-dollar-sign"></i><span class="menu-title" data-i18n="Purchase">Purchase</span>--}}
{{--                </a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li @if($url == 'product_purchase') class="active"  @endif>--}}
{{--                        <a href="{{route('product_purchase')}}" data-i18n="Purchase">Purchase</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'product_summary') class="active"  @endif>--}}
{{--                        <a href="{{route('product_summary')}}" data-i18n="Summary">Summary</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'return_product') class="active"  @endif>--}}
{{--                        <a href="{{route('return_product')}}" data-i18n="Return">Return</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'return_summary') class="active"  @endif>--}}
{{--                        <a href="{{route('return_summary')}}" data-i18n="Summary">Summary</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li> --}}

{{--            <li class=" nav-item">--}}
{{--                <a href="">--}}
{{--                    <i class="feather icon-percent"></i><span class="menu-title" data-i18n="Discount">Discount</span>--}}
{{--                </a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li @if($url == 'discount') class="active"  @endif>--}}
{{--                        <a href="{{route('discount')}}" data-i18n="Discount">Discount</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li> --}}

{{--            <li class=" nav-item">--}}
{{--                <a href="">--}}
{{--                    <i class="feather icon-briefcase"></i><span class="menu-title" data-i18n="Inventory">Inventory</span>--}}
{{--                </a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li @if($url == 'inventory_info') class="active"  @endif>--}}
{{--                        <a href="{{route('inventory_info')}}" data-i18n="Info">Info</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'inventory_damage') class="active"  @endif>--}}
{{--                        <a href="{{route('inventory_damage')}}" data-i18n="Damage">Damage</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'inventory_barcode') class="active"  @endif>--}}
{{--                        <a href="{{route('inventory_barcode')}}" data-i18n="Barcode">Barcode</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class=" nav-item">--}}
{{--                <a href="">--}}
{{--                    <i class="feather icon-activity"></i><span class="menu-title" data-i18n="Accounts">Accounts</span>--}}
{{--                </a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li @if($url == 'cash_in') class="active"  @endif>--}}
{{--                        <a href="{{route('cash_in')}}" data-i18n="Cash In">Cash In</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'cash_out') class="active"  @endif>--}}
{{--                        <a href="{{route('cash_out')}}" data-i18n="Cash Out">Cash Out</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'expendiser') class="active"  @endif>--}}
{{--                        <a href="{{route('expendiser')}}" data-i18n="Expendiser">Expendiser</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'balance') class="active"  @endif>--}}
{{--                        <a href="{{route('balance')}}" data-i18n="Balance">Balance</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class=" nav-item">--}}
{{--                <a href="">--}}
{{--                    <i class="feather icon-crop"></i><span class="menu-title" data-i18n="Product">Product</span>--}}
{{--                </a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li @if($url == 'product_type') class="active"  @endif>--}}
{{--                        <a href="{{route('product_type')}}" data-i18n="Type">Type</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'product_list') class="active"  @endif>--}}
{{--                        <a href="{{route('product_list')}}" data-i18n="List">List</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

            <li class=" nav-item">
                <a href="">
                    <i class="feather icon-command"></i><span class="menu-title" data-i18n="Supplier">Supplier</span>
                </a>
                <ul class="menu-content">
                    <li @if($url == 'supplier.index') class="active"  @endif>
                        <a href="{{route('supplier.index')}}" data-i18n="Info">Info</a>
                    </li>
                    <li @if($url == 'supplier_payment.index') class="active"  @endif>
                        <a href="{{route('supplier_payment.index')}}" data-i18n="Payment">Payment</a>
                    </li>
                </ul>
            </li>

{{--            <li class=" nav-item">--}}
{{--                <a href="">--}}
{{--                    <i class="feather icon-cpu"></i><span class="menu-title" data-i18n="HR">HR</span>--}}
{{--                </a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li @if($url == 'employees') class="active"  @endif>--}}
{{--                        <a href="{{route('employees')}}" data-i18n="Employee">Employee</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'employyee_payment') class="active"  @endif>--}}
{{--                        <a href="{{route('employyee_payment')}}" data-i18n="Payment">Payment</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'employyee_loan') class="active"  @endif>--}}
{{--                        <a href="{{route('employyee_loan')}}" data-i18n="Loan">Loan</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class=" nav-item">--}}
{{--                <a href="">--}}
{{--                    <i class="feather icon-codepen"></i><span class="menu-title" data-i18n="Member">Member</span>--}}
{{--                </a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li @if($url == 'add_member') class="active"  @endif>--}}
{{--                        <a href="{{route('add_member')}}" data-i18n="Add">Add</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'member_point') class="active"  @endif>--}}
{{--                        <a href="{{route('member_point')}}" data-i18n="Point">Point</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class=" nav-item">--}}
{{--                <a href="">--}}
{{--                    <i class="feather icon-database"></i><span class="menu-title" data-i18n="Users Details">Users Details</span>--}}
{{--                </a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li @if($url == 'user') class="active"  @endif>--}}
{{--                        <a href="{{route('user')}}" data-i18n="Users">Users</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'user_search') class="active"  @endif>--}}
{{--                        <a href="{{route('user_search')}}" data-i18n="Search">Search</a>--}}
{{--                    </li>--}}
{{--                    <li @if($url == 'user_attendence') class="active"  @endif>--}}
{{--                        <a href="{{route('user_attendence')}}" data-i18n="Attendance">Attendance</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}

{{--            <li class=" nav-item">--}}
{{--                <a href="">--}}
{{--                    <i class="feather icon-book"></i><span class="menu-title" data-i18n="Reports">Reports</span>--}}
{{--                </a>--}}
{{--                <ul class="menu-content">--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="Sales">Sales</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="Due">Due</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="Sales Return">Sales Return</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="Product List">Product List</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="Purchase">Purchase</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="Purchase Return">Purchase Return</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="Discount">Discount</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="Supplier">Supplier</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="Items">Items</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="Inventory">Inventory</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="HR">HR</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="Member">Member</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="Accounts">Accounts</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="User logs">User logs</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="Profit">Profit</a>--}}
{{--                    </li>--}}
{{--                    <li>--}}
{{--                        <a href="" data-i18n="Download">Download</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}


        </ul>

    </div>
</div>
