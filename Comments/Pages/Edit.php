<?php

    namespace IdnoPlugins\Comments\Pages {

        class Edit extends \Idno\Common\Page {

            function getContent() {

                $this->gatekeeper();    // This functionality is for logged-in users only

                
            }

            function postContent() {
                
                
                if ($uuid = $this->getInput('entity_uuid')) {
                    $object = \Idno\Common\Entity::getByUUID($uuid);
                
                    if ($object) {
                        
                        $name = $this->getInput('name');
                        $email = $this->getInput('email');
                        $url = $this->getInput('url');
                        $comment = $this->getInput('comment');
                        
                        $user = \Idno\Common\Entity::getByUUID($this->getInput('user_uuid'));
                        
                        if (!empty($user)) {
                            if (empty($name)) $name = $user->title;
                            if (empty($email)) $email = $user->email;
                            if (empty($url)) $url = $user->getUrl();
                        }
                        
                        // TODO: Spam check
                        
                        if ((!empty($name)) && (!empty($email)) && (!empty($comment))) {
                        
                            if (!empty($user)) {
                                $owner_image = $user->getIcon();
                            } else {
                                // TODO : Gravatar lookup for user
                                
                                if (empty($owner_image))
                                    $owner_image = \Idno\Core\site()->config()->url . 'gfx/users/default.png';
                            }
                            
                            $object->addAnnotation('reply', $name, $url, $owner_image, $comment);
                            if ($object->save())
                                \Idno\Core\site()->session()->addMessage('Comment successfully made...');
                            
                        } 
                        
                        $this->forward($object->getURL());
                    }
                    
                }
                
            }

        }

    }