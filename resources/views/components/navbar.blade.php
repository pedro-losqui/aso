<ul class="accordion-menu">
    <li>
        <a href="{{ route('home') }}">
            <i class="menu-icon icon-home4"></i><span>Dashboard</span>
        </a>
    </li>
    <li>
        <a href="javascript:void(0)">
            <i class="menu-icon icon-pencil"></i><span>Cadastro</span><i class="accordion-icon fas fa-angle-left"></i>
        </a>
        <ul class="sub-menu">
            <li><a href="{{ route('employee') }}">Colaborador</a></li>
            <li><a href="{{ route('company') }}">Empresa</a></li>
            <li><a href="{{ route('people') }}">Pessoa Física</a></li>
            <li><a href="{{ route('medic') }}">Médico</a></li>
            <li><a href="{{ route('exam') }}">Exame</a></li>
            <li><a href="{{ route('conclusion') }}">Parecer</a></li>
        </ul>
    </li>
    <li class="active-page">
        <a href="javascript:void(0)">
            <i class="menu-icon icon-clipboard"></i><span>Atendimento</span><i class="accordion-icon fas fa-angle-left"></i>
        </a>
        <ul class="sub-menu">
            <li><a href="{{ route('asoj') }}">Pessoa Jurídica</a></li>
            <li><a href="{{ route('asof') }}">Pessoa Física</a></li>
            <li><a href="{{ route('asoarchive') }}">Histórico</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0)">
            <i class="menu-icon icon-drawer"></i><span>Exames</span><i class="accordion-icon fas fa-angle-left"></i>
        </a>
        <ul class="sub-menu">
            <li><a href="{{ route('input') }}">Alocar</a></li>
            <li><a href="{{ route('output') }}">Liberar</a></li>
            <li><a href="{{ route('examarchive') }}">Histórico</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0)">
            <i class="menu-icon icon-ticket"></i><span>Recepção</span><i class="accordion-icon fas fa-angle-left"></i>
        </a>
        <ul class="sub-menu">
            <li><a href="{{ route('attendance') }}">Registro</a></li>
            <li><a href="{{ route('attendancearchive') }}">Histórico</a></li>
        </ul>
    </li>
    <li class="menu-divider"></li>
    <li>
        <a href="javascript:void(0)">
            <i class="menu-icon icon-cog"></i><span>Recepção</span><i class="accordion-icon fas fa-angle-left"></i>
        </a>
        <ul class="sub-menu">
            <li><a href="{{ route('profile') }}">Perfil</a></li>
            <li><a href="{{ route('user') }}">Usuário</a></li>
            <li><a href="{{ route('permission') }}">Permissão</a></li>
            <li><a href="{{ route('access') }}">Regras de Acesso</a></li>
        </ul>
    </li>
    <li>
        <form id="logout" action="{{ route('logout') }}" method="post">
            @csrf
        </form>
        <a href="#" onClick="document.getElementById('logout').submit();">
            <i class="menu-icon icon-switch"></i><span></span>
        </a>
    </li>
</ul>
