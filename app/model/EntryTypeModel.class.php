<?php

    class EntryTypeModel extends AppModel {

        public function getEntryType($id) {
            return $this->getDto('entry_type', 'id', $id);
        }

        public function edit($id) {
            $entryType = $this->getEntryType($id);
            $error = '';

            if (!$entryType->set('name', $_POST['name']))
                $error .= $entryType->FieldsErrors['name'] . '<br>';
            $entryType->set('need_partner', isset($_POST['need_partner']));

            if ($error != '') {
                Viewer::flash($error, 'e');

                return false;
            } else {
                return $this->update('entry_type', $entryType, array('id' => $id));
            }

        }

        public function add() {
            $error = '';
            $entryType = new Entry_Type();

            if (!$entryType->set('name', $_POST['name']))
                $error .= $entryType->FieldsErrors['name'] . '<br>';
            $entryType->set('need_partner', isset($_POST['need_partner']));

            if ($error != '') {
                Viewer::flash($error, 'e');
                return false;
            } else {
                return $this->insert('entry_type', $entryType);
            }
        }

    }
