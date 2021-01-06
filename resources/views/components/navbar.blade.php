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
            <li><a href="{{ route('user') }}">Usuário</a></li>
        </ul>
    </li>
    <li class="active-page">
        <a href="javascript:void(0)">
            <i class="menu-icon icon-clipboard"></i><span>Atendimento</span><i class="accordion-icon fas fa-angle-left"></i>
        </a>
        <ul class="sub-menu">
            <li><a href="{{ route('asoj') }}">Pessoa jurídica</a></li>
            <li><a href="#">Pessoa Física</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Histórico PJ</a></li>
            <li><a href="#">Histórico PF</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0)">
            <i class="menu-icon icon-drawer"></i><span>Exames</span><i class="accordion-icon fas fa-angle-left"></i>
        </a>
        <ul class="sub-menu">
            <li><a href="#">Alocar</a></li>
            <li><a href="#">Liberar</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Registro Entrada</a></li>
            <li><a href="#">Registro Saída</a></li>
        </ul>
    </li>
    <li>
        <a href="javascript:void(0)">
            <i class="menu-icon icon-ticket"></i><span>Recepção</span><i class="accordion-icon fas fa-angle-left"></i>
        </a>
        <ul class="sub-menu">
            <li><a href="#">Registro</a></li>
            <li><a href="#">Histórico</a></li>
        </ul>
    </li>
    <li class="menu-divider"></li>
    <li>
        <a href="#">
            <i class="menu-icon icon-switch"></i><span>Documentation</span>
        </a>
    </li>
</ul>
