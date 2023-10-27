@isset( $menu_lateral )

<div class="col s2 menu" style="height: 79vh;">
    <ul>
        <li class="z-depth-1"><a href="fc.php">Cálculo de FC</a></li>
        <li class="z-depth-1"><a href="mps.php">Matérias Primas</a></li>
        <li class="z-depth-1"><a href="analises.php">Análises</a></li>
        <li class="z-depth-1"><a href="fornecedores.php">Fornecedores</a></li>
        <li class="z-depth-1"><a href="connect.php">Entrada de MP's</a></li>
        <li class="z-depth-1"><a href="enzimas.php">Cálculo de Atividade Enzimática</a></li>
        <li class="z-depth-1"><a href="fichaprod.php"> {{ $paragrafo}} </a></li>
        <li class="z-depth-1"><a href= "{{ route('usuarios') }}">Usuários</a></li>
    </ul>
</div>
@endisset

