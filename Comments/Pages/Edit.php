<?php

    namespace IdnoPlugins\Comments\Pages {

        class Edit extends \Idno\Common\Page {

            function getContent() {

                $this->gatekeeper();    // This functionality is for logged-in users only

                
            }

            function postContent() {
                $this->gatekeeper();
                
                if ($uuid = $this->getInput('entity_uuid')) {
                    $object = \Idno\Common\Entity::getByUUID($uuid);
                    
                    if ($object) {
                        
                        $name = $this->getInput('name');
                        $email = $this->getInput('email');
                        $comment = $this->getInput('comment');
                        
                        $user = \Idno\Common\Entity::getByUUID($this->getInput('user_uuid'));
                        
                        
                        if ((!empty($name)) && (!empty($email)) && (!empty($comment))) {
                        
                            
                            
                        }
                        
                        $this->forward($object->getURL());
                    }
                }
            }

        }

    }