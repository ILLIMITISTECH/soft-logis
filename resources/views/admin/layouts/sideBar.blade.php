
<div class="sidebar-wrapper" data-simplebar="true" style="max-width: 240px !important">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">SoftLogis</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-back'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ url('/') }}" class="has-arrow">
                <div class="parent-icon"><i class='bx bx-home-alt'></i>
                </div>
                <div class="menu-title">Tableau de Bord</div>
            </a>
        </li>

        <li class="menu-label tex-uppercase">partenaire</li>
        @can('Ajouter Organisation')
        <li>
            <a href="{{ route('admin.company') }}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-buildings"></i>
                </div>
                <div class="menu-title">Organisations</div>
            </a>
        </li>
        @endcan

        {{-- @can('Modifier client') --}}
        <li>
            <a href="{{ route('admin.client') }}">
                <div class="parent-icon"><i class='bx bx-cookie'></i>
                </div>
                <div class="menu-title" style="font-size: 13px !important">Clients</div>
            </a>
        </li>
        {{-- @endcan --}}
        <li>
            <a href="{{ route('admin.transporteur') }}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-car"></i>
                </div>
                <div class="menu-title" style="font-size: 13px !important">Transporteurs</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.transitaire') }}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-transfer-alt"></i>
                </div>
                <div class="menu-title" style="font-size: 13px !important">Transitaires</div>
            </a>
        </li>

            {{-- </ul>
        </li> --}}

        <li class="menu-label">Articles</li>
        <li>
            <a href="{{ route('admin.article.index') }}">
                <div class="parent-icon"><i class='bx bx-shopping-bag fs-6'></i>
                </div>
                <div class="menu-title">Articles</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;" id="">
                <div class="parent-icon"><i class="fadeIn animated bx bx-equalizer fs-6" id="arrowIcon"></i></div>
                <div class="menu-title">Variation</div>
            </a>
            <ul id="subMenu">
                <li><a href="{{ route('admin.category') }}"><i class='bx bx-radio-circle'></i>Categories</a></li>
                <li><a href="{{ route('admin.marque') }}"><i class='bx bx-radio-circle'></i>Marque</a></li>
                <li><a href="{{ route('admin.ship_source') }}"><i class='bx bx-radio-circle'></i>Pays D'origine</a></li>
                <li><a href="{{ route('admin.article_model') }}"><i class='bx bx-radio-circle'></i>Model d'article</a></li>
                <li><a href="{{ route('admin.article_family') }}"><i class='bx bx-radio-circle'></i>Famille de produit</a></li>
            </ul>
        </li>

        <li class="menu-label">IMPORT</li>
        <li>
            <a href="{{ route('admin.sourcing.index') }}">
                <div class="parent-icon"><i class="lni lni-link fs-6"></i>
                </div>
                <div class="menu-title">Sourcing</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.od_transite.index') }}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-hive fs-6"></i>
                </div>
                <div class="menu-title">Ordre de Transit</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.od_livraisons.index') }}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-car fs-6"></i>
                </div>
                <div class="menu-title">Ordre de livraison</div>
            </a>
        </li>

        <li class="menu-label">EXPORT</li>
        <li>
            <a href="{{ route('admin.odre_expedition.index') }}">
                <div class="parent-icon"><i class="lni lni-docker fs-6"></i>
                </div>
                <div class="menu-title">Ordre d'Expedition</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.transit.to_expedition.index') }}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-task fs-6"></i>
                </div>
                <div class="menu-title">Ordre de Transit</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.transport.to_expedition.index') }}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-task fs-6"></i>
                </div>
                <div class="menu-title">Ordre de Transport</div>
            </a>
        </li>
        <li class="menu-label">Gestion de Stock</li>
        <li>
            <a href="{{ route('admin.stock.mouvement') }}">
                <div class="parent-icon"><i class="fadeIn animated bx bx-transfer fs-6"></i>
                </div>
                <div class="menu-title">Mouvement de stock</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.stock.entrepot') }}">
                <div class="parent-icon"><i class="lni lni-dropbox fs-6"></i></i>
                </div>
                <div class="menu-title">Entrepots</div>
            </a>
        </li>
        <li class="menu-label text-uppercase">Facturation</li>
        <li>
            <a href="{{ route('admin.facturation') }}">
                <div class="parent-icon"><i class="lni lni-notepad fs-6"></i>
                </div>
                <div class="menu-title">Facture Prestataire</div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.refacturation') }}">
                <div class="parent-icon"><i class="lni lni-amazon-pay fs-6"></i>
                </div>
                <div class="menu-title">Facture fournisseur</div>
            </a>
        </li>
        <li class="menu-label">Gestion des Comptes</li>
        <li class="menu-label text-capitalize pt-0 my-0">
            <a href="{{ route('admin.collaborateur.index') }}">
                <div class="parent-icon"><i class="lni lni-consulting fs-6"></i>
                </div>
                <div class="menu-title">Collaborateurs</div>
            </a>
        </li>

        <li class="menu-label py-0 my-0">Paramètre</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-cog fs-6"></i>
                </div>
                <div class="menu-title">Configuration</div>
            </a>
            <ul>
                <li> <a href="{{ route('admin.config.index') }}"><i class='bx bx-radio-circle'></i>Documents</a>
                </li>
                <li> <a href="{{ route('admin.role') }}"><i class='bx bx-radio-circle'></i>Role</a>
                </li>

            </ul>

        </li>

    </ul>
    <!--end navigation-->
</div>
