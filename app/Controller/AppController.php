<?php
// app/Controller/AppController.php
App::uses('Controller', 'Controller');
class AppController extends Controller {
  /**
   * The paginate options for this controller
   *
   * @var array
   */
  public $paginate = array();
  
    public $components = array(
       /* 'DebugKit.Toolbar',*/
			/*	'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'wiki_articles',
                'action' => 'index'
            ),
            'logoutRedirect' => array(
                'controller' => 'wiki_articles',
                'action' => 'index',
                'home'
            )
        )*/
    );

  //  public function beforeFilter() {
  //      $this->Auth->allow('index', 'view');
  //  }


}
?>
