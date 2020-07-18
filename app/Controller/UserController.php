<?php
class UserController extends AppController{
    public $uses='tUser';
    public function regist(){
        $this->Session->delete('error');
        $this->Session->delete('true');
        $this->Session->delete('name_exist');
        if ($this->request->is('post')){
            $checkmail = $this->tUser->find('first', array(
                'conditions' => array('tUser.e-mail' => $this->request->data('e-mail')),
                'field'=> array('tUser.name')
            ));
        if($checkmail){
            $this->Session->write('error','Email existed!');
            $this->Session->write('name_exist',$checkmail);
        }
        else{
            $this->Session->write('true','Regist email successfully!');
            $this->tUser->set(array(
                'e-mail' => $this->request->data('e-mail'),
                'password' => $this->request->data('password'),
                'name' => $this->request->data('name')
            ));
            $this->tUser->save();
        }
        }
        if($this->Session->read('name_exist')){
            $this->set('name_exist',$this->Session->read('name_exist'));
        }
    }
    public function login(){
        $this->Session->delete('login_success');
        $this->Session->delete('login_fail');
        if ($this->request->is('post')){
            $checklogin = $this->tUser->find('first', array(
                'conditions' => array(
                    'tUser.e-mail' => $this->request->data('e-mail'),
                    'tUser.password' => $this->request->data('password')
                ),
                'field'=> array('tUser.e-mail')
            ));
        if($checklogin){
            $this->Session->write('login_success','Login successfully!');
            $this->Session->write('account', $checklogin);
            return $this->redirect('/chat/feed');
        }
        else{
            $this->Session->write('login_fail','Email or password is incorrect. Sorry the login was not successful!');
        }
    }
            $this->set('email_user', $this->request->data('e-mail'));
    }
    public function logout() {
        $this->autoRender=null;
            $this->Session->destroy();
            return $this->redirect('/user/login');
    }
}