<?php

    class ExitTypeModel extends AppModel {

        public function getExitType($id) {
            return $this->getDto('exit_type', 'id', $id);
        }

        public function edit($id) {
            $exitType = $this->getExitType($id);
            $error = '';

            if (!$exitType->set('name', $_POST['name']))
                $error .= $exitType->FieldsErrors['name'] . '<br>';
            $exitType->set('need_partner', isset($_POST['need_partner']));

            if ($error != '') {
                Viewer::flash($error, 'e');

                return false;
            } else {
                if ($this->update('exit_type', $exitType, array('id' => $id))) {
                    Viewer::flash(_INSERT_SUCCESS, 's');

                    return true;
                } else {
                    Viewer::flash(_INSERT_ERROR, 'e');

                    return false;
                }
            }

        }

        public function add() {
            $error = '';
            $exitType = new Exit_Type();

            if (!$exitType->set('name', $_POST['name']))
                $error .= $exitType->FieldsErrors['name'] . '<br>';
            $exitType->set('need_partner', isset($_POST['need_partner']));

            if ($error != '') {
                Viewer::flash($error, 'e');
            } else {
                if ($this->insert('exit_type', $exitType)) {
                    Viewer::flash(_INSERT_SUCCESS, 's');

                    return true;
                } else {
                    Viewer::flash(_INSERT_ERROR, 'e');

                    return false;
                }
            }
        }

    }
