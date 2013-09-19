<?php

    namespace IdnoPlugins\Comments\Pages {

        class Edit extends \Idno\Common\Page {

            function getContent() {

                $this->gatekeeper();    // This functionality is for logged-in users only

                
            }

            function postContent() {
                $this->gatekeeper();
                
                if ($uuid = $this->getInput('uuid')) {
                    $object = \Idno\Common\Entity::getByUUID($uuid);
                    
                    if ($object) {
                        
                        $name = $this->getInput('name');
                        $email = $this->getInput('email');
                        $comment = $this->getInput('comment');
                        
                        if ((!empty($name)) && (!empty($email)) && (!empty($comment))) {
                        
                            
                            
                        }
                        
                        $this->forward($object->getURL());
                    }
                }
            }

        }

    }