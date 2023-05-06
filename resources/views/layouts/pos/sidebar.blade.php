<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow d-none" id="pos_sidebar" data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li @if ($url == 'home') class="active" @else class="nav-item" @endif>
                <a href="{{ route('home') }}">
                    <i class="feather icon-home"></i><span class="menu-title" data-i18n="Home">Home</span>
                </a>
            </li>

            <li @if ($url == 'dashboard') class="active" @else class="nav-item" @endif>
                <a href="{{ route('dashboard') }}">
                    <i class="feather icon-grid"></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span>
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
                    <i class="feather icon-settings"></i><span class="menu-title" data-i18n="Supplier">Setting</span>
                </a>
                <ul class="menu-content">
                    <li @if ($url == 'setting') class="active" @endif>
                        <a href="{{ route('setting') }}" data-i18n="Setting">General Setting</a>
                    </li>
                    <li @if ($url == 'managePOS') class="active" @endif>
                        <a href="{{ route('managePOS') }}" data-i18n="Website Content Setup">Website Setup</a>
                    </li>
                    <li @if ($url == 'printer_setup') class="active" @endif>
                        <a href="{{ route('printer_setup') }}" data-i18n="POS View Setup">Printer Setup</a>
                    </li>
                    <li @if ($url == 'emailSetup') class="active" @endif>
                        <a href="{{ route('emailSetup') }}" data-i18n="Email Setup">Email Setup</a>
                    </li>
                    <li @if ($url == 'thirdPartySetup') class="active" @endif>
                        <a href="{{ route('thirdPartySetup') }}" data-i18n="Email Setup">3rd Party Setup</a>
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
                    <i class="feather icon-file-text"></i><span class="menu-title" data-i18n="Setup">Food Menu
                        Setup</span>
                </a>
                <ul class="menu-content">

                    <li @if ($url == 'ingredient_category.index') class="active" @endif>
                        <a href="{{ route('ingredient_category.index') }}" data-i18n="Setting">Ingredient Category</a>
                    </li>
                    <li @if ($url == 'ingredientUnit.index') class="active" @endif>
                        <a href="{{ route('ingredientUnit.index') }}" data-i18n="Setting">Ingredient Units</a>
                    </li>
                    <li @if ($url == 'ingredient.index') class="active" @endif>
                        <a href="{{ route('ingredient.index') }}" data-i18n="Setting">Ingredient</a>
                    </li>
                    <li @if ($url == 'menuCategory.index') class="active" @endif>
                        <a href="{{ route('menuCategory.index') }}" data-i18n="Food Menu Category">Food Menu
                            Category</a>
                    </li>
                    <li @if ($url == 'menu.index' || $url == 'menu.create' || $url == 'menu.edit') class="active" @endif>
                        <a href="{{ route('menu.index') }}" data-i18n="Food Menu">Food Menu</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="feather icon-briefcase"></i><span class="menu-title"
                        data-i18n="Inventory">Inventory</span>
                </a>
                <ul class="menu-content">
                    <li @if ($url == 'purchase.index' || $url == 'purchase.create' || $url == 'purchase.edit') class="active" @endif>
                        <a href="{{ route('purchase.index') }}" data-i18n="">Purchase</a>
                    </li>
                    <li @if ($url == 'stock.index') class="active" @endif>
                        <a href="{{ route('stock.index') }}" data-i18n="">Stock</a>
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
                    <li @if ($url == 'waste.index' || $url == 'waste.create' || $url == 'waste.edit') class="active" @endif>
                        <a href="{{ route('waste.index') }}" data-i18n="">Waste</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="feather icon-dollar-sign"></i><span class="menu-title" data-i18n="Supplier">Manage
                        Expense</span>
                </a>
                <ul class="menu-content">
                    <li @if ($url == 'expense.index') class="active" @endif>
                        <a href="{{ route('expense.index') }}" data-i18n="Info">Expense</a>
                    </li>
                    <li @if ($url == 'expense_item.index') class="active" @endif>
                        <a href="{{ route('expense_item.index') }}" data-i18n="Payment">Expense Item</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="feather icon-user"></i><span class="menu-title" data-i18n="User">Manage Employee</span>
                </a>
                <ul class="menu-content">
                    <li @if ($url == 'employee.index') class="active" @endif>
                        <a href="{{ route('employee.index') }}" data-i18n="Employee">Employee</a>
                    </li>
                    <li @if ($url == 'department.index') class="active" @endif>
                        <a href="{{ route('department.index') }}" data-i18n="Department">Department</a>
                    </li>
                    <li @if ($url == 'designation.index') class="active" @endif>
                        <a href="{{ route('designation.index') }}" data-i18n="Designation">Designation</a>
                    </li>
                    <li @if ($url == 'attendence.index') class="active" @endif>
                        <a href="{{ route('attendence.index') }}" data-i18n="Attendence">Attendence</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="feather icon-users"></i><span class="menu-title" data-i18n="Supplier">Manage
                        Customers</span>
                </a>
                <ul class="menu-content">
                    <li @if ($url == 'customer.index') class="active" @endif>
                        <a href="{{ route('customer.index') }}" data-i18n="Food Menu">Customers</a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a href="">
                    <i class="feather icon-command"></i><span class="menu-title" data-i18n="Supplier">Supplier</span>
                </a>
                <ul class="menu-content">
                    <li @if ($url == 'supplier.index') class="active" @endif>
                        <a href="{{ route('supplier.index') }}" data-i18n="Info">Info</a>
                    </li>
                    <li @if ($url == 'supplier_payment.index') class="active" @endif>
                        <a href="{{ route('supplier_payment.index') }}" data-i18n="Payment">Due Payment</a>
                    </li>
                </ul>
            </li>

        </ul>

    </div>
</div>
