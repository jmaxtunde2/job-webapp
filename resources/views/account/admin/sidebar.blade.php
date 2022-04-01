<?php
/**
 * Author: Perfect Tech Lab
 * Date: 2020/02/05
 * Time: 10:51PM
 * File Name: sidebar.blade.php
 */
?>

<div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
		<!--left-fixed -navigation-->
		<aside class="sidebar-left">
      <nav class="navbar navbar-inverse">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="{{route(''.$data["user_type"].'.dashboard')}}"><span class="fa fa-area-chart"></span> Espace<span class="dashboard_text">Administrateur</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">MAIN NAVIGATION</li>
              <li class="treeview">
                <a href="{{route('admin.dashboard')}}">
                <i class="fa fa-dashboard"></i> <span>Tableau de Bord</span>
                </a>
              </li>


              <li class="treeview">
                <a href="#">
                <i class="fa fa-suitcase"></i>
                <span>Emplois</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('admin.emploi_index')}}"><i class="fa fa-list"></i> Tous Emploi</a></li>
                  <li><a href="{{route('admin.emploi_create')}}"><i class="fa fa-plus"></i> Ajouter Emploi</a></li>
                  <li><a href="{{route('admin.findemploi')}}"><i class="fa fa-search"></i> Rechercher</a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                <i class="fa fa-newspaper-o"></i> <span>Publicités</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route(''.$data["user_type"].'.publicite_create')}}"><i class="fa fa-plus"></i> Nouvelle Publicité</a></li>
                    <li><a href="{{route(''.$data["user_type"].'.publicite_index')}}"><i class="fa fa-list"></i> Toutes les Publicité</a></li>
                    <li><a href="{{route(''.$data["user_type"].'.findpublicite')}}"><i class="fa fa-search"></i> Rechercher</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Utilisateurs</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{route(''.$data["user_type"].'.user_create')}}"><i class="fa fa-plus"></i> Nouveau Utilisateur</a></li>
                    <li><a href="{{route(''.$data["user_type"].'.users_index')}}"><i class="fa fa-list"></i> Voir tous les Utilisateurs</a></li>
                    <li><a href="{{route(''.$data["user_type"].'.finduser')}}"><i class="fa fa-search"></i> Cherecher</a></li>
                </ul>
            </li>

            <li> <a href="{{route('candidat.profil_admin')}}"><i class="fa fa-eye"></i>Liste des Candidats</a> 
            </li>
            <li> <a href="{{route('candidat.search_admin')}}"><i class="fa fa-search"></i>Chercher Candidat</a> 
            </li>


			        <li class="treeview">
                <a href="#">
                <i class="fa fa-th"></i>
                <span>Categorie</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('admin.category_index')}}"><i class="fa fa-list"></i> List Categorie</a></li>
                  <li><a href="{{route('admin.category_create')}}"><i class="fa fa-plus"></i> Ajouter Categorie</a></li>
                  <li><a href="{{route('admin.findcategory')}}"><i class="fa fa-search"></i> Rechercher</a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                <i class="fa fa-dot-circle-o"></i>
                <span>Type de Job</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('admin.type_index')}}"><i class="fa fa-list"></i> Tous types de Job</a></li>
                  <li><a href="{{route('admin.type_create')}}"><i class="fa fa-plus"></i> Ajouter Type</a></li>
                  <li><a href="{{route('admin.findtype')}}"><i class="fa fa-search"></i> Rechercher</a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                <i class="fa fa-fa"></i>
                <span>Pays</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('admin.pays_index')}}"><i class="fa fa-list"></i> Tous Pays</a></li>
                  <li><a href="{{route('admin.pays_create')}}"><i class="fa fa-plus"></i> Ajouter Pays</a></li>
                  <li><a href="{{route('admin.findpays')}}"><i class="fa fa-search"></i> Rechercher</a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="#">
                <i class="fa fa-bars"></i>
                <span>Ville</span>
                <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                  <li><a href="{{route('admin.ville_index')}}"><i class="fa fa-list"></i> Toutes Villes</a></li>
                  <li><a href="{{route('admin.ville_create')}}"><i class="fa fa-plus"></i> Ajouter Ville</a></li>
                  <li><a href="{{route('admin.findville')}}"><i class="fa fa-search"></i> Rechercher</a></li>
                </ul>
              </li>

              <li class="treeview">
                <a href="{{route('admin.setting_edit')}}">
                <i class="fa fa-cogs"></i>
                <span>Parametres</span>
                <span class="label label-primary pull-right">Modifier</span>
                </a>
              </li>
              <li>
                <a href="{{route('account.logout')}}">
                    <i class="fa fa-sign-out"></i> <span> Deconnexion</span>

                </a>

            </li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>