<?php

class FileController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $form = new Application_Form_File;
        $this->view->form = $form;
         
          if ($this->getRequest()->isPost()) {
          if ($form->isValid($this->getRequest()->getPost())) 
                {
             $message = $form->getValue('message');
             echo 'Message is ';var_dump($message);
           
             
             $upload = new Zend_File_Transfer_Adapter_Http();
             $upload->setDestination(APPLICATION_PATH . '\upload');
             $i=0;
             $files = $upload->getFileInfo();
             foreach ($files as $file => $info)
             {
                 var_dump($file);
                  echo 'File is ';var_dump($info);
                  $upload->addFilter('Rename', array(
                                    'target'    => "$i.dat",
                                    'overwrite' => true
                                                    ), $file);
             $i++;    
                    if(!$upload->receive($info['name'])) {
                    $msg= $upload->getMessages();
                    echo 'Error is ';var_dump($msg);
             }
             }
             
             //empty the form value after submit
                $form->reset();
         
          }
    }
    }


}

