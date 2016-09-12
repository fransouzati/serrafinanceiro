<?php

    class SalesmanModel extends AppModel {

        public function getSalesman($id) {
            return $this->getDto('salesman', 'id', $id);
        }

        public function edit($id) {
            $salesman = $this->getSalesman($id);
            $error = '';

            if (!$salesman->set('name', $_POST['name']))
                $error .= $salesman->FieldsErrors['name'] . '<br>';
            if (!$salesman->set('percentage', str_replace('%', '', $_POST['percentage']) / 100))
                $error .= $salesman->FieldsErrors['percentage'] . '<br>';

            if ($error != '') {
                Viewer::flash($error, 'e');

                return false;
            } else {
                return $this->update('salesman', $salesman, array('id' => $id));
            }

        }

        public function add() {
            $error = '';
            $salesman = new Salesman();
    
            if (!$salesman->set('name', $_POST['name']))
                $error .= $salesman->FieldsErrors['name'] . '<br>';
            if (!$salesman->set('percentage', str_replace('%', '', $_POST['percentage']) / 100))
                $error .= $salesman->FieldsErrors['percentage'] . '<br>';

            if ($error != '') {
                Viewer::flash($error, 'e');
                return false;
            } else {
                return $this->insert('salesman', $salesman);
            }
        }
        
        public function makeQuery(){
            $sql = 'SELECT * FROM project p 
                    JOIN project_salesman s ON s.id_project = p.id 
                    WHERE done = 1 AND ';
            
            $period = $_POST['_filter_period'];
            if ($period != '') {
                $period = explode('/', $period);
                $sql .= ' p.done_date >= "' . trim($period[0]) . '" AND p.done_date <= "' . trim($period[1]) . '" AND ';
            }
    
            $salesman = $_POST['_filter_salesman'];
            if ($salesman != '') {
                $sql .= ' s.id_salesman = ' . $salesman . ' AND';
            }
    
            $sql = rtrim($sql, ' WHEREAND');
    
            $projects = $this->query($sql);
    
            $projects = $this->query2dto($projects, 'project_salesman');
    
            return $projects;
        }
        
        public function query2export(){
            $projects = $this->makeQuery();
            $project = new Project_salesman();
            $salesmans = array();
            $totals = array();
            $finalTotal = 0;
            foreach ($projects as $project) {
                if(!isset($salesmans[$project->get('id_salesman')])) {
                    $salesmans[$project->get('id_salesman')] = array();
                    $totals[$project->get('id_salesman')] = 0;
                }
                $comission = $project->get('id_project', true)->get('value') * $project->get('percentage');
                $finalTotal += $comission;
                $totals[$project->get('id_salesman')] += $comission;
                $comission = $project->moneyMask($comission);
                $salesmans[$project->get('id_salesman')][] = 'R$'.$comission.' ('.$project->get('id_project', true)->get('name').')';
            }
            
            foreach($salesmans as $id => $comissions){
                $final[] = array(
                    $this->getSalesman($id)->get('name'),
                    implode(' + ', $comissions),
                    'R$'.$project->moneyMask($totals[$id]),
                );
            }
            $final[] = array(
                '',
                '',
                'R$'.$project->moneyMask($finalTotal),
            );
    
            return $final;
        }
        
        public function makeExportType(){
            $type = '';
            
            $period = $_POST['_filter_period'];
            if ($period != '') {
                $period = explode('/', $period);
                $type .= ' | Projetos finalizados entre ' . trim(date('d/m/Y', strtotime($period[0]))) . ' e ' . trim(date('d/m/Y', strtotime($period[1])));
            }
    
            $salesman = $_POST['_filter_salesman'];
            if ($salesman != '') {
                $type .= ' | Vendedor/Colaborador ' . $this->getSalesman($salesman)->get('name') . ' |';
            }
    
            return rtrim($type, '| ');
        }

    }
