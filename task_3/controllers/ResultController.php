<?php
    namespace Controllers;

    use Models\Result;

    class ResultController {
        public function getSelect() {
            $user = new Result();
            return $user->select();
        }

    }