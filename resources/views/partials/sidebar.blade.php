@inject('request', 'Illuminate\Http\Request')
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu"
            data-keep-expanded="false"
            data-auto-scroll="true"
            data-slide-speed="200">
            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>

            <li class="{{ $request->segment(1) == 'clients' ? 'active' : '' }}">
                <a href="{{ route('clients.index') }}">
                    <i class="fa fa-user-plus"></i>
                    <span class="title">Clients</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'projects' ? 'active' : '' }}">
                <a href="{{ route('projects.index') }}">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">Projects</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'notes' ? 'active' : '' }}">
                <a href="{{ route('notes.index') }}">
                    <i class="fa fa-comments-o"></i>
                    <span class="title">Notes</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'documents' ? 'active' : '' }}">
                <a href="{{ route('documents.index') }}">
                    <i class="fa fa-file-text-o"></i>
                    <span class="title">Documents</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'transactions' ? 'active' : '' }}">
                <a href="{{ route('transactions.index') }}">
                    <i class="fa fa-credit-card"></i>
                    <span class="title">Transactions</span>
                </a>
            </li>
            <li class="{{ $request->segment(1) == 'reports' ? 'active' : '' }}">
                <a href="{{ route('reports.index') }}">
                    <i class="fa fa-bar-chart"></i>
                    <span class="title">Reports</span>
                </a>
            </li>
            <li>
                        <a href="#">
                            <i class="fa fa-gears"></i>
                            <span class="title">Settings</span>
                            <span class="fa arrow"></span>
                        </a>
                        <ul class="sub-menu">
                                <li class="{{ $request->segment(1) == 'currencies' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('currencies.index') }}">
                                        <i class="fa fa-money"></i>
                                        <span class="title">
                                            Currencies
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'transaction_types' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('transaction_types.index') }}">
                                        <i class="fa fa-exchange"></i>
                                        <span class="title">
                                            Transaction Types
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'income_sources' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('income_sources.index') }}">
                                        <i class="fa fa-database"></i>
                                        <span class="title">
                                            Income Sources
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'client_statuses' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('client_statuses.index') }}">
                                        <i class="fa fa-server"></i>
                                        <span class="title">
                                            Client Statuses
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'project_statuses' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('project_statuses.index') }}">
                                        <i class="fa fa-server"></i>
                                        <span class="title">
                                            Project Statuses
                                        </span>
                                    </a>
                                </li>
                                <li class="{{ $request->segment(1) == 'roles' ? 'active active-sub' : '' }}">
                                    <a href="{{ route('roles.index') }}">
                                        <i class="fa fa-key"></i>
                                        <span class="title">
                                            Roles
                                        </span>
                                    </a>
                                </li>
                                </ul>
                    </li>
                                    @if(Auth::user()->role_id == 1)
            <li class="{{ $request->segment(1) == 'users' ? 'active' : '' }}">
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="title">Users</span>
                </a>
            </li>
            @endif
            <li class="{{ $request->segment(1) == 'user_actions' ? 'active' : '' }}">
                <a href="{{ route('user_actions.index') }}">
                    <i class="fa fa-users"></i>
                    <span class="title">User actions</span>
                </a>
            </li>
            

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>
{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}
<button type="submit">Logout</button>
{!! Form::close() !!}