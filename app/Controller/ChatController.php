<?php
    class ChatController extends AppController
    {
        public $uses = 'tFeed';
        public function feed()
        {
            if ($this->request->is('post'))
            {   
                if($this->request->data('id') != '') {
                    if(!empty($this->request->data['tFeed']['file']['name'])){
                        $file = $this->request->data['tFeed']['file'];
    
                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                        $arr_ext = array('jpg', 'jpeg', 'gif','png');
                        if (in_array($ext, $arr_ext)) {
                            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/upload/' . $file['name']);
                            $this->tFeed->set(array(
                                'image_file_name'=>$file['name'],
                            ));
                        } else{
                            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'video/upload/' . $file['name']);
                            $this->tFeed->set(array(
                                'video_file_name'=>$file['name'],
                            ));
                        }
                    }
                    $this->tFeed->set(array(
                        'id' => $this->request->data('id'),
                        'name' => $this->request->data('name'),
                        'message' => $this->request->data('message'),
                        'update_at' => date('Y/m/d h:i:s')
                    ));
                    $this->tFeed->save();
                    $this->Session->delete('data');
                } else {
                    if(!empty($this->request->data['tFeed']['file']['name'])){
                        $file = $this->request->data['tFeed']['file'];
                        $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
                        $arr_ext = array('jpg', 'jpeg', 'gif','png');
                        if (in_array($ext, $arr_ext)) {
                            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/upload/' . $file['name']);
                            $this->tFeed->set(array(
                                'image_file_name'=>$file['name'],
                            ));
                        } else {
                            move_uploaded_file($file['tmp_name'], WWW_ROOT . 'video/upload/' . $file['name']);
                            $this->tFeed->set(array(
                                'video_file_name'=>$file['name'],
                            ));
                        }
                    }
                    $this->tFeed->set(array(
                        'id' => $this->request->data('id'),
                        'name' => $this->request->data('name'),
                        'message' => $this->request->data('message'),
                        'create_at' => date('Y/m/d h:i:s')
                    ));
                    $this->tFeed->save();
                }
            }
            if($this->Session->read('data'))
            {
                $this->set('data',$this->Session->read('data'));
            }
            $chats = $this->tFeed->find('all');
            $this->set('chats', $chats);
        }
        public function delete($id)
        {
            $this->autoRender = false;
            $this->tFeed->delete($id);
            return $this->redirect('/chat/feed');
        }
        public function edit($id)
        {
            $this->autoRender = false;
            $this->Session->write('data', $this->tFeed->findById($id));
            return $this->redirect('/chat/feed');
        }
    }