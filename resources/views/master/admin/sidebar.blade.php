<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li @if($url == 'home') class="active" @else class="nav-item" @endif>
                <a  href="{{route('home')}}">
                    <i class="feather icon-home"></i><span class="menu-title">Home</span>
                </a>
            </li>

            <li @if($url == 'dashboard') class="active" @else class="nav-item" @endif>
                <a  href="{{route('dashboard')}}">
                    <i class="feather icon-grid"></i><span class="menu-title">Dashboard</span>
                </a>
            </li>

            <li @if($url == 'cashRegister') class="active" @else class="nav-item" @endif>
                <a  href="{{route('cashRegister')}}">
                    <i class="feather icon-credit-card"></i><span class="menu-title">Register Details</span>
                </a>
            </li>

            <li @if($url == 'pos') class="active" @else class="nav-item" @endif>
                <a  href="{{route('pos')}}">
                    <i class="feather icon-pocket"></i><span class="menu-title">POS</span>
                </a>
            </li>

            <li @if($url == 'kitchenDashboard') class="active" @else class="nav-item" @endif>
                <a  href="{{route('kitchenDashboard')}}">
                    <i class="feather icon-airplay"></i><span class="menu-title">Kitchen Dashboard</span>
                </a>
            </li>


            <li @if($url == 'kitchenStock') class="active" @else class="nav-item" @endif>
                <a  href="{{route('kitchenStock')}}">
                    <i class="feather icon-shopping-cart"></i><span class="menu-title">Kitchen Stock</span>
                </a>
            </li>

            <li @if($url == 'sale') class="active" @else class="nav-item" @endif>
                <a  href="{{route('sale')}}">
                    <i class="feather icon-list"></i><span class="menu-title">Sale List</span>
                </a>
            </li>

{{--            <li  class="nav-item @if($url == 'pos') active @endif"  >--}}
{{--                <a href="javascript:" onclick="openPosWindow(this)">--}}
{{--                    <i class="feather icon-pocket"></i><span class="menu-title">POS</span>--}}
{{--                </a>--}}
{{--            </li>--}}

            <li class=" nav-item">
                <a href="">
                    <i class="feather icon-settings"></i><span class="menu-title">Setting</span>
                </a>
                <ul class="menu-content">
                    <li @if($url == 'setting') class="active"  @endif>
                        <a href="{{route('setting')}}">General Setting</a>
                    </li>
{{--                    <li @if($url == 'outlet_setting') class="active"  @endif>--}}
{{--                        <a href="{{route('outlet_setting')}}">Outlet Setting</a>--}}
{{--                    </li>--}}
                    <li @if($url == 'managePOS') class="active"  @endif>
                        <a href="{{route('managePOS')}}">Website Setup</a>
                    </li>
                    <li @if($url == 'printer_setup') class="active"  @endif>
                        <a href="{{route('printer_setup')}}">Printer Setup</a>
                    </li>
                    <li @if($url == 'emailSetup') class="active"  @endif>
                        <a href="{{route('emailSetup')}}" >Email Setup</a>
                    </li>
                    <li @if($url == 'thirdPartySetup') class="active"  @endif>
                        <a href="{{route('thirdPartySetup')}}" >3rd Party Setup</a>
                    </li>
                </ul>
            </li>


            <li class=" nav-item">
                <a href="">
                    <i class="fa fa-table"></i><span class="menu-title" >Manage Restaurant</span>
                </a>
                <ul class="menu-content">
                    <li @if ($url == 'payment_method.index') class="active" @endif>
                        <a href="{{ route('payment_method.index') }}" >Payment Method</a>
                    </li>
                    <li @if ($url == 'table.index') class="active" @endif>
                        <a href="{{ route('table.index') }}">Table</a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href="#">
                    <i class="feather icon-file-text"></i><span class="menu-title">Food Menu Setup</span>
                </a>
                <ul class="menu-content">
                    <li @if($url == 'ingredient_category.index') class="active"  @endif>
                        <a href="{{route('ingredient_category.index')}}">Ingredient Category</a>
                    </li>
                    <li @if($url == 'ingredientUnit.index') class="active"  @endif>
                        <a href="{{route('ingredientUnit.index')}}">Ingredient Units</a>
                    </li>
                    <li @if($url == 'ingredient.index') class="active"  @endif>
                        <a href="{{route('ingredient.index')}}">Ingredient</a>
                    </li>
                    <li @if($url == 'menuCategory.index') class="active"  @endif>
                        <a href="{{route('menuCategory.index')}}">Food Menu Category</a>
                    </li>
                    <li @if($url == 'menu.index' || $url == "menu.create" || $url == "menu.edit") class="active"  @endif>
                        <a href="{{route('menu.index')}}">Food Menu</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="feather icon-briefcase"></i><span class="menu-title" data-i18n="Inventory">Inventory</span>
                </a>
                <ul class="menu-content">
                    <li @if($url == 'purchase.index' || $url == 'purchase.create' || $url == 'purchase.edit') class="active"  @endif>
                        <a href="{{route('purchase.index')}}">Purchase</a>
                    </li>
                    <li @if($url == 'stock.index') class="active"  @endif>
                        <a href="{{route('stock.index')}}">Stock</a>
                    </li>
                    <li @if($url == 'stock_adjustment') class="active"  @endif>
                        <a href="{{route('stock_adjustment')}}">Stock Adjustment</a>
                    </li>
                    <li @if($url == 'warehousetype.index') class="active"  @endif>
                        <a href="{{route('warehousetype.index')}}">Warehouse Category</a>
                    </li>
                    <li @if($url == 'warehouse.index') class="active"  @endif>
                        <a href="{{route('warehouse.index')}}">Warehouse</a>
                    </li>
                    <li @if($url == 'waste.index'|| $url == 'waste.create' || $url == 'waste.edit') class="active"  @endif>
                        <a href="{{route('waste.index')}}">Waste</a>
                    </li>

                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="feather icon-dollar-sign"></i><span class="menu-title">Manage Expense</span>
                </a>
                <ul class="menu-content">
                    <li @if($url == 'expense.index') class="active"  @endif>
                        <a href="{{route('expense.index')}}">Expense</a>
                    </li>
                    <li @if($url == 'expense_item.index') class="active"  @endif>
                        <a href="{{route('expense_item.index')}}">Expense Item</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="feather icon-user"></i><span class="menu-title">Manage Employee</span>
                </a>
                <ul class="menu-content">
                    <li @if($url == 'employee.index') class="active"  @endif>
                        <a href="{{route('employee.index')}}">Employee</a>
                    </li>
                    <li @if($url == 'department.index') class="active"  @endif>
                        <a href="{{route('department.index')}}">Department</a>
                    </li>
                    <li @if($url == 'designation.index') class="active"  @endif>
                        <a href="{{route('designation.index')}}">Designation</a>
                    </li>
                    <li @if($url == 'user_roles.index') class="active"  @endif>
                        <a href="{{route('user_roles.index')}}">User Roles</a>
                    </li>
                    <li @if($url == 'attendence.index') class="active"  @endif>
                        <a href="{{route('attendence.index')}}">Attendence</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="feather icon-users"></i><span class="menu-title" data-i18n="Supplier">Manage Customers</span>
                </a>
                <ul class="menu-content">
                    <li @if($url == 'customer.index') class="active"  @endif>
                        <a href="{{route('customer.index')}}">Customers</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="feather icon-command"></i><span class="menu-title">Supplier</span>
                </a>
                <ul class="menu-content">
                    <li @if($url == 'supplier.index') class="active"  @endif>
                        <a href="{{route('supplier.index')}}">Info</a>
                    </li>
                    <li @if($url == 'supplier_payment.index') class="active"  @endif>
                        <a href="{{route('supplier_payment.index')}}">Due Payment</a>
                    </li>
                </ul>
            </li>

            <div>



            {{-------------------- project url end -----------------}}


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
            </div>



        </ul>

    </div>
</div>
