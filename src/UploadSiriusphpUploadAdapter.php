<?php

namespace PHPCraft\Upload;

use Sirius\Upload\Handler;

/**
 * Manages uploads using codeguy/upload  (https://github.com/codeguy/Upload.git)
 *
 * @author vuk <info@vuk.bg.it>
 */
class UploadSiriusPHPUploadAdapter implements UploadInterface
{
    protected $upload;
    protected $field;
    protected $result;
    
    /**
     * Sets field to be processed
     *
     * @param string $field
     **/
    public function setField($field)
    {
        $this->field = $field;
    }
    
    /**
     * Gets field to be processed
     **/
    public function getField()
    {
        return $this->field;
    }
    
    /**
     * Sets destination
     *
     * @param string $path
     **/
    public function setDestination($path)
    {
        $this->upload = new \Sirius\Upload\Handler($path);
    }
    
    /**
     * Adds a validation rule
     *
     * @param string $type as defined into adapted class
     * @param array $options rule options, if any
     * @param array $message localized message for rule validation failure
     **/
    public function addValidationRule($type, $options = null, $message = null)
    {
        $this->upload->addRule($type, $options, $message);
    }
    
    /**
     * Processes uploaded file
     * @return boolean upload outcome
     **/
    public function process()
    {
        $this->result = $this->upload->process($_FILES[$this->field]);
        return $this->result->isValid();
    }
    
    /**
     * Gets any generated message
     * @return array of messages
     **/
    public function getMessages()
    {
        if(!isset($this->result)) {
            return;
        }
        $messages = array();
        foreach((array) $this->result->getMessages() as $message) {
            $messages[] = $message->__tostring();
        }
        return $messages;
    }
    
    /**
     * Gets any information about uploaded file
     * @return array
     **/
    public function getUploadedFileInfo()
    {
        return [
            'tmpName' => $_FILES[$this->field]['tmp_name'],
            'name' => $this->result->name
        ];
    }
    
    /**
     * Performs any action to close upload operation
     **/
    public function close()
    {
        if($this->result->isValid()) {
            $this->result->confirm();
        }
    }
}