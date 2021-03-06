<?php
    
    trait Functions {
        
        public static $functions = array(
           'Bill' => array(
               'view',
               'edit',
               'add',
               'pay',
               'payments',
               'delete',
           ),
           'Client' => array(
               'view',
               'edit',
               'add',
               'export',
               'pendenciesModal',
           ),
           'Entry' => array(
               'view',
               'add',
               'export',
           ),
           'EntryType' => array(
               'view',
               'edit',
               'add',
           ),
           'ExtraCharge' => array(
               'add',
               'pay',
               'delete',
           ),
           'Investor' => array(
               'view',
               'edit',
               'add',
           ),
           'Project' => array(
               'view',
               'edit',
               'addInstallment',
               'editInstallment',
               'deleteInstallment',
               'payInstallment',
               'add',
               'export',
               'end',
               'installmentsModal',
               'addInstallmentForm',
               'payInstallmentModal',
               'undoPayment',
               'addSalesman',
               'deleteSalesman',
           ),
           'Report' => array(
               'view',
               'add',
               'pay',
               'toPdf',
               'toExcel',
           ),
           'User' => array(
               'home',
               'login',
               'logout',
               'view',
               'edit',
               'add',
               'viewBalance',
               'editBalance',
           ),
           'Withdraw' => array(
               'view',
               'add',
               'export',
           ),
           'WithdrawType' => array(
               'view',
               'edit',
               'add',
           ),
           'Salesman' => array(
               'view',
               'edit',
               'add',
               'export',
               'getPercentage',
           ),

        );
        
        public static $publics = array(
           'Client' => array(
               'pendenciesModal',
           ),
           'Project' => array(
               'installmentsModal',
               'addInstallmentForm',
               'payInstallmentModal',
               'setSalesmans',
           ),
           'User' => array(
               'home',
               'login',
               'logout',
               'view',
               'edit',
           ),
           'Salesman' => array(
               'export',
               'getPercentage',
           ),

        );
        
        public static $block = array(
            'Bill' => array(
                'Visualizar' => array(
                    'view',
                    'payments',
                ),
                'Editar' => array(
                    'view',
                    'payments',
                    'edit',
                ),
                'Cadastrar' => array(
                    'add',
                    'view',
                    'payments',
                ),
                'Pagar' => array(
                    'pay'
                ),
                'Deletar' => array(
                    'view',
                    'delete',
                )
            ),
            'Client' => array(
                'Visualizar' => array(
                    'view',
                    'export',
                ),
                'Editar' => array(
                    'edit',
                    'view',
                    'export',
                ),
                'Cadastrar' => array(
                    'add',
                    'view',
                    'export',
                ),
            ),
            'Entry' => array(
                'Visualizar' => array(
                    'view',
                    'export',
                ),
                'Cadastrar' => array(
                    'add',
                    'view',
                    'export',
                ),
            ),
            'EntryType' => array(
                'Visualizar' => array(
                    'view',
                ),
                'Editar' => array(
                    'edit',
                    'view',
                ),
                'Cadastrar' => array(
                    'add',
                    'view',
                ),
            ),
            'ExtraCharge' => array(
                'Cadastrar' => array(
                    'add',
                ),
                'Pagar' => array(
                    'pay',
                ),
                'Deletar' => array(
                    'delete',
                ),
            ),
            'Investor' => array(
                'Visualizar' => array(
                    'view',
                ),
                'Editar' => array(
                    'edit',
                    'view',
                ),
                'Cadastrar' => array(
                    'add',
                    'view',
                ),
            ),
            'Project' => array(
                'Visualizar' => array(
                    'view',
                    'export',
                ),
                'Editar' => array(
                    'edit',
                    'end',
                    'view',
                    'report',
                ),
                'Cadastrar' => array(
                    'add',
                    'view',
                    'report',
                ),
                'Cadastrar/Editar/Deletar parcelas' => array(
                    'addInstallment',
                    'editInstallment',
                    'deleteInstallment',
                ),
                'Pagar parcelas' => array(
                    'payInstallment',
                    'undoPayment',
                ),
                'Controlar comissões' => array(
                    'addSalesman',
                    'deleteSalesman',
                    'view',
                )
            ),
            'Report' => array(
                'Visualizar' => array(
                    'view',
                    'toPdf',
                    'toExcel',
                ),
                'Cadastrar' => array(
                    'add',
                    'view',
                    'toPdf',
                    'toExcel',
                ),
                'Pagar' => array(
                    'pay',
                    'view',
                    'toPdf',
                    'toExcel',
                ),
            ),
            'User' => array(
                'Cadastrar' => array(
                    'add',
                ),
                'Controlar caixa' => array(
                    'viewBalance',
                    'editBalance',
                ),
            ),
            'Withdraw' => array(
                'Visualizar' => array(
                    'view',
                    'export',
                ),
                'Cadastrar' => array(
                    'add',
                    'view',
                    'export',
                ),
            ),
            'WithdrawType' => array(
                'Visualizar' => array(
                    'view',
                ),
                'Editar' => array(
                    'edit',
                    'view',
                ),
                'Cadastrar' => array(
                    'add',
                    'view',
                ),
            ),
            'Salesman' => array(
                'Cadastrar' => array(
                    'view',
                    'add',
                ),
                'Visualizar' => array(
                    'view',
                ),
                'Editar' => array(
                    'view',
                    'edit',
                ),
            )
        );
        
        public static $controllers = array(
           'Bill' => 'Contas a pagar',
           'Client' => 'Clientes',
           'Entry' => 'Entradas',
           'EntryType' => 'Tipos de entrada',
           'ExtraCharge' => 'Cobranças extra',
           'Investor' => 'Investidores',
           'Project' => 'Projetos',
           'Report' => 'Relatórios de título',
           'User' => 'Administradores',
           'Withdraw' => 'Saídas',
           'WithdrawType' => 'Tipos de saída',
           'Salesman' => 'Vendedores/Colaboradores',

        );
        
    }