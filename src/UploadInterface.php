<?php

namespace PHPCraft\Upload;

/**
 * Manages upload
 *
 * @author vuk <info@vuk.bg.it>
 */
interface UploadInterface
{
    /**
     * Sets field to be processed
     *
     * @param string $field
     **/
    public function setField($field);
    
    /**
     * Gets field to be processed
     **/
    public function getField();
    
    /**
     * Sets destination
     *
     * @param string $path
     **/
    public function setDestination($path);
    
    /**
     * Adds a validation rule
     *
     * @param string $type as defined into adapted class
     * @param array $options rule options, if any
     * @param array $message localized message for rule validation failure
     **/
    public function addValidationRule($type, $options = null, $message = null);
    
    /**
     * Processes uploaded file
     * @return boolean upload outcome
     **/
    public function process();
    
    /**
     * Gets any generated message
     * @return array of messages
     **/
    public function getMessages();
    
    /**
     * Gets any information about uploaded file
     * @return array
     **/
    public function getUploadedFileInfo();
    
    /**
     * Performs any action to close upload operation
     **/
    public function close();
}