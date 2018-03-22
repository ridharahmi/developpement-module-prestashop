<?php
/*
* Module prestashop 1.7
* author: Ridha Rahmi
* Url: http://www.facebook.com/ridha411
* Date Time: 13-03-2018

*/

if (!defined('_PS_VERSION_'))
{
  exit;
}


class MyModule extends Module
{
  public function __construct()
  {
    $this->name = 'mymodule';
    $this->tab = 'front_office_features';
    $this->version = '1.0.0';
    $this->author = 'Ridha Rahmi';
    $this->need_instance = 0;
    $this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
    $this->bootstrap = true;

    parent::__construct();

    $this->displayName = $this->l('My Module');
    $this->description = $this->l('This is module calcul quantity product group by coulis, palettes and conteneur in prestashop 1.7');


    //$this->confirmUninstall = $this->l('Are you sure you want to uninstall?');
   
  }


  public function install()
  {
    if (!parent::install() || !$this->registerHook('displayHeader') || !$this->registerHook('displayHome') )
      return false;
    return true;
  }


  public function uninstall()
  {
    if (!parent::uninstall())
      return false;
    return true;
  }


  public function getContent(){
    if(Tools::getValue('titlemodule') && Tools::getValue('bodymodule')){
      $msg  = Tools::getValue('titlemodule');
      $body = Tools::getValue('bodymodule');
      $status =  false;
      

     if(ConfigurationCore::updateValue('title_champ', $msg) && ConfigurationCore::updateValue('description_champ', $body))
      {
        $status = true;
        $this->context->smarty->assign(array(
           'submit_form' => true,
           'status'      => $status
         ));

      }
    }
    return $this->display(__FILE__, 'views/admin/admin.tpl');
  }


  public function hookDisplayHome(){

    $message = ConfigurationCore::get('title_champ');
    $description = ConfigurationCore::get('description_champ');
    $this->context->smarty->assign(array(
      'message'     => $message, 
      'description' => $description,
      'url'         => 'www.unicom.tn'

    ));
    return $this->display(__FILE__, 'views/home.tpl');
  }




}