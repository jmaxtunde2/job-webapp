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
            <h1><a class="navbar-brand" href="{{route(''.$data["user_type"].'.dashboard')}}"><span class="fa fa-area-chart"></span> Espace<span class="dashboard_text">Employeur</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">Menu Principale</li>
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
                  <li><a href="{{route(''.$data["user_type"].'.emploi_index')}}"><i class="fa fa-list"></i> Tous Emploi</a></li>
                  <li><a href="{{route(''.$data["user_type"].'.emploi_create')}}"><i class="fa fa-plus"></i> Ajouter Emploi</a></li>
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
                </ul>
            </li>
            <li> <a href="{{route('candidat.profil')}}"><i class="fa fa-eye"></i>Liste des Candidats</a> 
            </li>
            <li> <a href="{{route('candidat.search')}}"><i class="fa fa-search"></i>Chercher Candidat</a> 
            </li>
            <li> <a href="{{route('account.profile')}}"><i class="fa fa-user"></i>Paramètre du Compte</a> 
            </li>
								

              <li>
                <a href="{{route('account.logout')}}">
                    <i class="fa fa-sign-out"></i> <span> Déconnexion</span>

                </a>

            </li>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
      </nav>
    </aside>
	</div>