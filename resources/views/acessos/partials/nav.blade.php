<nav id="paginacao" class="navigation mt-3" aria-label="...">
    <ul class="pagination justify-content-center">

      <li class="page-item disabled">
        <span class="page-link ">Exibindo <strong>{{ count($acessos) }}</strong> registros de um total de <strong>{{ $nav['total'] }}</strong> registros</span>
      </li>
      <li lass="page-item">&nbsp; &nbsp;</li>

      <li class="page-item {{ $nav['pagCor'] == 1 ? 'disabled' : '' }}">
        <a class="page-link"
          href="acessos?page=1&perPage={{ $nav['perPag'] }}"
          aria-label="Previous">
          <span aria-hidden="true">Primeira</span>
        </a>
      </li>
      <li class="page-item {{ $nav['pagCor'] == 1 ? 'disabled' : '' }}">
        <a class="page-link"
          href="acessos?page={{ $nav['pagCor'] - 1 }}&perPage={{ $nav['perPag'] }}"
          aria-label="Previous">
          <span aria-hidden="true">&laquo;</span>
        </a>
      </li>

      @for ($pag = $nav['pagIni']; $pag <= $nav['pagFin']; $pag++)
        @if ($pag == $nav['pagCor'])
          <li class="page-item active">
            <a class="page-link"
              href="acessos?page={{ $pag }}&perPage={{ $nav['perPag'] }}">
              {{ $pag }}
            </a>
          </li>
        @else
          @if ($pag >= 1 and $pag <= $nav['totPag'])
            <li class="page-item"><a class="page-link"
                href="acessos?page={{ $pag }}&perPage={{ $nav['perPag'] }}">
                {{ $pag }}</a></li>
          @endif
        @endif
      @endfor

      <li class="page-item {{ $nav['pagCor'] == $nav['totPag'] ? 'disabled' : '' }}">
        <a class="page-link"
          href="acessos?page={{ $nav['pagCor'] + 1 }}&perPage={{ $nav['perPag'] }}"
          aria-label="Next">
          <span aria-hidden="true">&raquo;</span>
        </a>
      </li>
      <li class="page-item {{ $nav['pagCor'] == $nav['totPag'] ? 'disabled' : '' }}">
        <a class="page-link"
          href="acessos?page={{ $nav['totPag'] }}&perPage={{ $nav['perPag'] }}"
          aria-label="Previous">
          <span aria-hidden="true">Última</span>
        </a>
      </li>
    </ul>
</nav>