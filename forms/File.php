<?php

class Application_Form_File extends Zend_Form
{
    public function init()
    {
        $this->setMethod('post');
            $this->setAttrib('enctype', 'multipart/form-data');
            $textarea = new Zend_Form_Element_Textarea('message');
            $textarea->setOptions(array('cols' => '40',
             'rows' => '10',
             'required'   => true,
             'Label' => 'Enter Your Message:',
             'class' => 'form-control' ));
            $this->addElement($textarea);  

            $element = new Zend_Form_Element_File('file_e_1[]');
            $element->setAttrib('multiple', true);
            $element->setMultiFile(3);
            $element->setRequired(false);
            $this->addElement($element, 'file_e_1');
            
            $this->addElement('hash', 'csrf', array(
                              'ignore' => true));
            
            $this->addElement('submit', 'submit', array(
                              'ignore'  => true,
                              'label' => 'Send Message',
                              'rows' => '4',
                              'class' => 'btn btn-default btn-sm'));
    }
}