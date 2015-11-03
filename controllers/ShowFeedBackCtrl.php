<?php
class ShowFeedBackCtrl
    extends AController{
    protected $view='feedBack';
    public function get_body(){
        $users=new FeedBackModel();
        $items=$users->render();
        $this->display(['items'=>$items]);
    }

}