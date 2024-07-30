<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'LoginController/comeLogin';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Login'] = 'LoginController/comeLogin';


$route['Home'] = 'HomeController/menu';

$route['mijery'] = 'HomeController/test';

$route['article/insert'] = 'ArticleController/page_insertArticle';
$route['article/add']['GET'] = 'ArticleController/page_addArticle';

$route['article/getDesignation']['GET'] = 'ArticleController/getDesignation';

$route['article/data'] = 'ArticleController/page_dataArticle';
$route['article/fiche']['GET'] = 'ArticleController/page_ficheStock';
$route['article/addition'] = 'ArticleController/addition';
$route['article/suppression']['GET'] = 'ArticleController/suppression';
$route['article/datail']['GET'] = 'ArticleController/page_detailArticle';
$route['article/test']['GET'] = 'ArticleController/test';


$route['demande'] = 'DemandeController/all_demande';


$route['demande/insertion'] = 'DemandeController/send_demande';

$route['demande/form'] = 'DemandeController/page_demande';
$route['demande/data'] = 'DemandeController/demande_table';
$route['demade/validation/(:any)'] = 'DemandeController/formValidationDem/$1';
$route['DemandeController/validation'] = 'DemandeController/validation';
$route['demande/refuse']['GET'] = 'DemandeController/refuse';
$route['DemandeController/acceptWarning']['GET'] = 'DemandeController/acceptWarning';
$route['demande/info']['GET'] = 'DemandeController/fullInfo_byNumDem';

$route['QteDemande/control'] = 'DemandeController/control_Quant';


$route['User/getUser']['GET']='UserController/getUserby_matri';
$route['user/data'] = 'UserController/page_dataUser';
$route['user/profil']['GET'] = 'UserController/page_profilUser';
$route['User/block']['GET'] = 'UserController/block_user';
$route['User/unblock']['GET'] = 'UserController/active_user';
$route['User/passControl']['GET'] = 'UserController/passControl';
$route['User/changePass']['GET'] = 'UserController/changePass';
$route['User/boot']['GET'] = 'UserController/reboot_user';

$route['config'] = 'AdminController/page';
$route['insertDivision'] = 'AdminController/insertionDIVISION';
$route['insertAgent'] = 'AdminController/insertionAGENT';
$route['insertNommenclature'] = 'AdminController/insertionNOMENCLATURE';
$route['insertCompte'] = 'AdminController/insertionCOMPTE';
$route['insertCategorie'] = 'AdminController/insertionCATEGORIE';
$route['insertArticle'] = 'AdminController/insertionARTICLE';


$route['assets'] = 'HomeController/assets';
// Page nomenclature/compte
$route['cmpt_nom'] = 'HomeController/cmpt_nom';
// Page categorie
$route['category'] = 'HomeController/category';
// Page service
$route['service'] = 'HomeController/service';
// Page division
$route['division'] = 'HomeController/division';
// Page origine
$route['origine'] = 'HomeController/origine';
// Page nomenclature
$route['nomenclature'] = 'HomeController/nomenclature';
// Page compte
$route['compte'] = 'HomeController/compte';
// Page fichedetenteur
$route['fichedetenteur'] = 'HomeController/fichedetenteur';
$route['sesagents'] = 'HomeController/sesagents';
$route['user/materiel'] = 'HomeController/detention';
// Page concernant du patrimoine
$route['detailassets/(:any)'] = 'AnyController/detailassets/$1';
$route['afficheassets']['GET'] = 'GetController/afficheassets';
$route['updateassets'] = 'AnyController/updateassets';
$route['entres']='HomeController/assets';
$route['utilises']='AjaxController/utilises';
$route['sorties']='AjaxController/sorties';
//AjaxController
$route['supprimercat/(:any)']['DELETE'] = 'AjaxController/supprimercat/$1';
$route['supprimerdiv/(:any)']['DELETE'] = 'AjaxController/supprimerdiv/$1';
$route['supprimerser/(:any)']['DELETE'] = 'AjaxController/supprimerser/$1';
//Affichage with GET
$route['affichcat']['GET'] = 'GetController/affichcat';
$route['affichnom']['GET'] = 'GetController/affichnom';
$route['affichcmpt']['GET'] = 'GetController/affichcmpt';
$route['affichdiv']['GET'] = 'GetController/affichdiv';
$route['affichser']['GET'] = 'GetController/affichser';
$route['affichmat']['GET']= 'GetController/affichmat';
$route['informations']['GET'] = 'GetController/informations';
//Modification with ANY
$route['updtcat/(:any)'] = 'AnyController/Modifiercat/$1';
$route['updtcmpt/(:any)'] = 'AnyController/Modifiercmpt/$1';
$route['updtnom/(:any)'] = 'AnyController/Modifiernom/$1';
$route['updtdiv/(:any)'] = 'AnyController/Modifierdiv/$1';
$route['updtser/(:any)'] = 'AnyController/Modifierser/$1';
// Les listes
$route['listecompte'] = 'ListController/listecompte';
$route['listenomenclature'] = 'ListController/listenomenclature';
$route['listeservice'] = 'ListController/listeservice';
$route['listedivision'] = 'ListController/listedivision';
$route['listecategorie'] = 'ListController/listecategorie';