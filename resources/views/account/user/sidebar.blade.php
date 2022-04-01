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
            <h1><a class="navbar-brand" href="{{route(''.$data["user_type"].'.dashboard')}}"><span class="fa fa-area-chart"></span> Espace<span class="dashboard_text">Candidat</span></a></h1>
          </div>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="sidebar-menu">
              <li class="header">Menu Principale</li>
              <li class="treeview">
                <a href="{{route('user.dashboard')}}">
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
                  <li><a href="{{route('job_listing')}}"><i class="fa fa-list"></i> Emplois</a></li>
             </ul>
              </li>

              <li> <a href="{{route(''.$data["user_type"].'.cv')}}"><i class="fa fa-user"></i>Votre CV</a> 
            </li>
            <li> <a href="{{route(''.$data["user_type"].'.updatecv')}}"><i class="fa fa-user"></i>Edit Profil</a> 
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