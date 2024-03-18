<?php

namespace SGP;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return array(
    'router' => array(
        'routes' => array(
            'sgp' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp',
                    'defaults' => array(
                        'controller' => Controller\IndexController::class,
                        'action' => 'index',
                    ),
                ),
            ),
            'acl-sgp-graficos' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/dashboard',
                    'defaults' => array(
                        'controller' => Controller\IndexController::class,
                        'action' => 'graficos',
                    ),
                ),
            ),
            'acl-sgp-orcamento-projetos' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/orcamento-projetos',
                    'defaults' => array(
                        'controller' => Controller\OrcamentoController::class,
                        'action' => 'orcamentoProjetos',
                    ),
                ),
            ),
            'orcamento-projetos' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/orcamento-projetos',
                    'defaults' => array(
                        'controller' => Controller\OrcamentoController::class,
                        'action' => 'orcamentoProjetos',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'orcamento-projetos-todos' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/orcamento-projetos-todos',
                    'defaults' => array(
                        'controller' => Controller\OrcamentoController::class,
                        'action' => 'orcamentoProjetosAll',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'editar-projeto' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/orcamento-projetos/editar-projeto',
                    'defaults' => array(
                        'controller' => Controller\OrcamentoController::class,
                        'action' => 'editarProjeto',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'acl-sgp-material' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/materiais',
                    'defaults' => array(
                        'controller' => Controller\MaterialController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'SGP\Controller',
                                'controller' => 'Acompanhamento'
                            )
                        )
                    )
                ),
            ),
            'cadastrar-projeto' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/orcamento-projetos/cadastrar-projeto',
                    'defaults' => array(
                        'controller' => Controller\OrcamentoController::class,
                        'action' => 'cadastrarProjeto',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'proposta' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/proposta',
                    'defaults' => array(
                        'controller' => Controller\PropostaController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'SGC\Controller',
                                'controller' => 'Acompanhamento'
                            )
                        )
                    )
                ),
            ),
            'sgp-aguardando-recebimento' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/aguardando-recebimento',
                    'defaults' => array(
                        'controller' => Controller\NcbrController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'SGC\Controller',
                                'controller' => 'Ncbr'
                            )
                        )
                    )
                ),
            ),
            'sgp-autorizacao-pagamento' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/autorizacao-pagamento',
                    'defaults' => array(
                        'controller' => Controller\AtpController::class,
                        'action' => 'listaAtp',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id][/:aem]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'SGP\Controller',
                                'controller' => 'Atp'
                            )
                        )
                    )
                ),
            ),
            'recebimento-autorizacao-pagamento' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/recebimento-autorizacao-pagamento',
                    'defaults' => array(
                        'controller' => Controller\AtpController::class,
                        'action' => 'listaAtp',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id][/:aem]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'SGP\Controller',
                                'controller' => 'Atp'
                            )
                        )
                    )
                ),
            ),
            'proposta-pesquisa' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/proposta/pesquisa',
                    'defaults' => array(
                        'controller' => Controller\PropostaController::class,
                        'action' => 'pesquisa',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'SGC\Controller',
                                'controller' => 'Acompanhamento'
                            )
                        )
                    )
                ),
            ),
            'acompanhamento-proposta' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/acompanhamento/proposta',
                    'defaults' => array(
                        'controller' => Controller\AcompanhamentoProjetoController::class,
                        'action' => 'proposta',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'SGC\Controller',
                                'controller' => 'Acompanhamento'
                            )
                        )
                    )
                ),
            ),
            'acompanhamento-relatorio' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/acompanhamento/relatorio',
                    'defaults' => array(
                        'controller' => Controller\AcompanhamentoRelatorioController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'SGP\Controller',
                                'controller' => 'Acompanhamento'
                            )
                        )
                    )
                ),
            ),
            'projeto' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/projeto',
                    'defaults' => array(
                        'controller' => Controller\ProjetoController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id][/:gestorProjeto][/:projetoSituacao]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                                'gestorProjeto' => '[0-1]?',
                                'projetoSituacao' => '[0-9]+'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'encerramento-projeto' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/encerramento-projeto',
                    'defaults' => array(
                        'controller' => Controller\EncerramentoController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id][/:codFinanciamento]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                                'gestorProjeto' => '[0-1]?',
                                'projetoSituacao' => '[0-9]+'
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'acompanhamento-mudanca' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/acompanhamento/mudanca-projeto',
                    'defaults' => array(
                        'controller' => Controller\AcompanhamentoProjetoController::class,
                        'action' => 'mudancaProjeto',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'SGC\Controller',
                                'controller' => 'Acompanhamento'
                            )
                        )
                    )
                ),
            ),
            'pesquisa-mudanca' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/projeto/pesquisa-mudanca',
                    'defaults' => array(
                        'controller' => Controller\ProjetoController::class,
                        'action' => 'pesquisaMudanca',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'andamento-mudanca' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/projeto/andamento-mudanca',
                    'defaults' => array(
                        'controller' => Controller\ProjetoController::class,
                        'action' => 'andamentoMudanca',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'SGC\Controller',
                                'controller' => 'Acompanhamento'
                            )
                        )
                    )
                ),
            ),
            'sgp-projeto-negp' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/projeto/pesquisa-negp',
                    'defaults' => array(
                        'controller' => Controller\ProjetoController::class,
                        'action' => 'pesquisaNegp',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'subprojeto' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/subprojeto',
                    'defaults' => array(
                        'controller' => Controller\SubProjetoController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'subprojeto-pendetes' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/subprojeto/pendentes',
                    'defaults' => array(
                        'controller' => Controller\SubProjetoController::class,
                        'action' => 'pendentes',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'aguardando-ativacao' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/aguardando-ativacao',
                    'defaults' => array(
                        'controller' => Controller\AtivacaoController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'SGP\Controller',
                                'controller' => 'aguardando-ativacao'
                            )
                        )
                    )
                ),
            ),
            'aguardando-ativacao-acompanhamento' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/aguardando-ativacao/acompanhamento',
                    'defaults' => array(
                        'controller' => Controller\AtivacaoController::class,
                        'action' => 'acompanhamento',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'SGP\Controller',
                                'controller' => Controller\AtivacaoController::class,
                            )
                        )
                    )
                ),
            ),
            'analise-instancia' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/analise-instancia',
                    'defaults' => array(
                        'controller' => Controller\AcompanhamentoAtivacaoController::class,
                        'action' => 'ativacaoInstancia',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'acl-sgp-perfil' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/perfil',
                    'defaults' => array(
                        'controller' => Controller\PerfilController::class,
                        'action' => 'cadastroPerfilUsuario',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'acl-sgp-instancias' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/admin/instancia',
                    'defaults' => array(
                        'controller' => Controller\InstanciaController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\InstanciaController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'acl-sgp-instancias-funcao' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/admin/instancia-funcao',
                    'defaults' => array(
                        'controller' => Controller\InstanciaFuncaoController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\InstanciaFuncaoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'acl-sgp-parametro' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/admin/parametro',
                    'defaults' => array(
                        'controller' => Controller\ParametroBancoController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\ParametroBancoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-admin-modulo-requisicao' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/SGP/admin/moduloRequisicao',
                    'defaults' => array(
                        'controller' => Controller\ModuloRequisicaoController::class,
                        'action' => 'cadastrarModuloRequisicao',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\ModuloRequisicaoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'acl-sgp-instancia-usuario' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/admin/instanciaUsuario',
                    'defaults' => array(
                        'controller' => Controller\InstanciaUsuarioController::class,
                        'action' => 'cadastraInstanciaUsuario',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\InstanciaUsuarioController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-fornecedor-cadastrar' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/fornecedor/cadastrar',
                    'defaults' => array(
                        'controller' => Controller\FornecedorController::class,
                        'action' => 'cadastrar',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                 'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'acl-sgp-fornecedor' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/fornecedor',
                    'defaults' => array(
                        'controller' => Controller\FornecedorController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'acl-sgp-pessoa' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/pessoa',
                    'defaults' => array(
                        'controller' => Controller\PessoaController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                               'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-recurso' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/recurso',
                    'defaults' => array(
                        'controller' => Controller\RecursoController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-membro-equipe' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/projeto/membro-equipe',
                    'defaults' => array(
                        'controller' => Controller\EquipeController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-projeto-repositorio-arquivo' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/projeto/arquivo-repositorio',
                    'defaults' => array(
                        'controller' => Controller\ArquivoProjetoRepositorioController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-entrega' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/entrega',
                    'defaults' => array(
                        'controller' => Controller\EntregaController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-cronograma' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/cronograma',
                    'defaults' => array(
                        'controller' => Controller\CronogramaController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-licao-aprendida' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/licao-aprendida',
                    'defaults' => array(
                        'controller' => Controller\LicaoAprendidaController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-requisicao-compra' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/requisicao-compra',
                    'defaults' => array(
                        'controller' => Controller\RequisicaoCompraController::class,
                        'action' => 'acompanhamento'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id][/:aux]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_\-]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-prestacao-conta' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/prestacao-conta',
                    'defaults' => array(
                        'controller' => Controller\PrestacaoContaController::class,
                        'action' => 'acompanhamento'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id][/:aux]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_\-]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-requisicao-compra-pendente' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/requisicao-compra/acompanhamentopendente',
                    'defaults' => array(
                        'controller' => Controller\RequisicaoCompraController::class,
                        'action' => 'acompanhamentopendente'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[a-zA-Z0-9_-]+',
//                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-execucao' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/execucao',
                    'defaults' => array(
                        'controller' => Controller\ExecucaoController::class,
                        'action' => 'acompanhamento'
                    )
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-aem' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/aem',
                    'defaults' => array(
                        'controller' => Controller\AemSgpController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\AemSgpController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-acompanhamento-rcc' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/acompanhamento/rcc',
                    'defaults' => array(
                        'controller' => Controller\ExecucaoController::class,
                        'action' => 'acompanhamentoRcc',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'SGC\Controller',
                                'controller' => 'Execucao'
                            )
                        )
                    )
                ),
            ),
            'sgp-andamento-compras' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/andamento-compras',
                    'defaults' => array(
                        'controller' => Controller\AndamentoComprasController::class,
                        'action' => 'aguardandoRecebimento',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                    'paginator' => array(
                        'type' => 'Segment',
                        'options' => array(
                            'route' => '[/page/:page]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'page' => '\d+'
                            ),
                            'defaults' => array(
                                '__NAMESPACE__' => 'SGC\Controller',
                                'controller' => 'AndamentoCompras'
                            )
                        )
                    )
                ),
            ),
            //rota relatório cotablilidade
            'sgp-relatorios-contabilidade' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/relatorioContabilidade',
                    'defaults' => array(
                        'controller' => Controller\RelatoriosContabilidadeController::class,
                        'action' => 'filtros',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\RelatoriosContabilidadeController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-dashboard' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/graficos',
                    'defaults' => array(
                        'controller' => Controller\DashboardIniciacaoController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\DashboardIniciacaoController::class,
                                'action' => 'index',
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-dashboard-planejamento' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/graficos-planejamento',
                    'defaults' => array(
                        'controller' => Controller\DashboardPlanejamentoController::class,
                        'action' => 'planejamento',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\DashboardPlanejamentoController::class,
                                'action' => 'index',
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-dashboard-execucao' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/graficos-execucao',
                    'defaults' => array(
                        'controller' => Controller\DashboardExecucaoController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\DashboardExecucaoController::class,
                                'action' => 'index',
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-indicadores' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/indicadores',
                    'defaults' => array(
                        'controller' => Controller\IndicadoresController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\IndicadoresController::class,
                                'action' => 'index',
                            ),
                        ),
                    ),
                ),
            ),
            //rota relatório projeto
            'sgp-relatorios-projetos' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/relatorioProjetos',
                    'defaults' => array(
                        'controller' => Controller\RelatoriosProjetoController::class,
                        'action' => 'filtros',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\RelatoriosProjetoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            //rota relatório subprojeto
            'sgp-relatorios-subprojetos' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/relatorioSubprojetos',
                    'defaults' => array(
                        'controller' => Controller\RelatoriosProjetoController::class,
                        'action' => 'filtrosrelatorioSubprojetos',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\RelatoriosProjetoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            //rota relatório cotablilidade
            'sgp-relatorios-parceiros' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/relatorioInstituicoes',
                    'defaults' => array(
                        'controller' => Controller\RelatoriosProjetoController::class,
                        'action' => 'filtrosInstituicoesParceiras',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\RelatoriosProjetoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            //rota relatório cotablilidade
            'sgp-relatorios-equipe' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/relatorioEquipe',
                    'defaults' => array(
                        'controller' => Controller\RelatoriosProjetoController::class,
                        'action' => 'filtrosMembrosEquipe',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\RelatoriosProjetoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-sage-iniciativa' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/sageIniciativa',
                    'defaults' => array(
                        'controller' => Controller\SageIniciativaController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\SageIniciativaController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-sage-acao' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/sageAcao',
                    'defaults' => array(
                        'controller' => Controller\SageAcaoController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\SageAcaoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-sage-finalidade' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/sageFinalidade',
                    'defaults' => array(
                        'controller' => Controller\SageFinalidadeController::class,
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\SageFinalidadeController::class,
                            ),
                        ),
                    ),
                ),
            ),
            //rota relatório cotablilidade
            'sgp-relatorios-agencias' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/relatorioAgencias',
                    'defaults' => array(
                        'controller' => Controller\RelatoriosProjetoController::class,
                        'action' => 'filtrosAgencias',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
//                                'id' => '[0-9]+',
                                'id' => '[a-zA-Z0-9_-]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\RelatoriosProjetoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-relatorios-sus' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/relatorioSUS',
                    'defaults' => array(
                        'controller' => Controller\RelatoriosProjetoController::class,
                        'action' => 'filtrosSUS',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\RelatoriosProjetoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-relatorios-aem' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/relatorioAem',
                    'defaults' => array(
                        'controller' => Controller\RelatoriosProjetoController::class,
                        'action' => 'filtrosAem',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\RelatoriosProjetoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-relatorios-itens-cancelados' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/relatorioItensCancelados',
                    'defaults' => array(
                        'controller' => Controller\RelatoriosProjetoController::class,
                        'action' => 'filtrosItensCancelados',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\RelatoriosProjetoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-relatorios-cep-ceua' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/relatorioCepCeua',
                    'defaults' => array(
                        'controller' => Controller\RelatoriosProjetoController::class,
                        'action' => 'filtrosCepCeua',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\RelatoriosProjetoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-relatorios-fornecedores' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/relatorioFornecedores',
                    'defaults' => array(
                        'controller' => Controller\RelatoriosProjetoController::class,
                        'action' => 'filtrosFornecedoresEntregas',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\RelatoriosProjetoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-relatorios-laboratorios' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/relatorioLaboratorios',
                    'defaults' => array(
                        'controller' => Controller\RelatoriosProjetoController::class,
                        'action' => 'filtrosLaboratorios',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\RelatoriosProjetoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-relatorios-metas-projetos' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/relatorioMetasProjetos',
                    'defaults' => array(
                        'controller' => Controller\RelatoriosProjetoController::class,
                        'action' => 'relatorioMetasProjetos',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\RelatoriosProjetoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            //rota relatório movimentação de compras
            'sgp-relatorios-mov-compras' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/relatoriosMovimentacaoCompras',
                    'defaults' => array(
                        'controller' => Controller\RelatoriosProjetoController::class,
                        'action' => 'filtrosrelatoriosMovimentacaoCompras',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\RelatoriosProjetoController::class,
                            ),
                        ),
                    ),
                ),
            ),
            'sgp-graficos-compras' => array(
                'type' => Literal::class,
                'options' => array(
                    'route' => '/sgp/dashboard-compras',
                    'defaults' => array(
                        'controller' => Controller\DashboardMovimentacoesComprasController::class,
                        'action' => 'graficosCompras',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type' => 'segment',
                        'options' => array(
                            'route' => '[/:action][/:id]',
                            'constraints' => array(
                                'action' => '[a-z][a-zA-Z_]*',
                                'id' => '[0-9]+',
                            ),
                            'defaults' => array(
                                'controller' => Controller\DashboardMovimentacoesComprasController::class,
                            ),
                        ),
                    ),
                ),
            ),
        )
    ),
    'controllers' => array(
        'factories' => array(
            Controller\PropostaController::class => \Base\Factory\ControllerFactory::class,
            Controller\ProjetoController::class => \Base\Factory\ControllerFactory::class,
            Controller\SubProjetoController::class => \Base\Factory\ControllerFactory::class,
            Controller\IndexController::class => \Base\Factory\ControllerFactory::class,
            Controller\OrcamentoController::class => \Base\Factory\ControllerFactory::class,
            Controller\AtivacaoController::class => \Base\Factory\ControllerFactory::class,
            Controller\InstanciaController::class => \Base\Factory\ControllerFactory::class,
            Controller\InstanciaFuncaoController::class => \Base\Factory\ControllerFactory::class,
            Controller\ParametroBancoController::class => \Base\Factory\ControllerFactory::class,
            Controller\InstanciaUsuarioController::class => \Base\Factory\ControllerFactory::class,
            Controller\AcompanhamentoAtivacaoController::class => \Base\Factory\ControllerFactory::class,
            Controller\AcompanhamentoProjetoController::class => \Base\Factory\ControllerFactory::class,
            Controller\AcompanhamentoRelatorioController::class => \Base\Factory\ControllerFactory::class,
            Controller\FornecedorController::class => \Base\Factory\ControllerFactory::class,
            Controller\PessoaController::class => \Base\Factory\ControllerFactory::class,
            Controller\RecursoController::class => \Base\Factory\ControllerFactory::class,
            Controller\EntregaController::class => \Base\Factory\ControllerFactory::class,
            Controller\MaterialController::class => \Base\Factory\ControllerFactory::class,
            Controller\EquipeController::class => \Base\Factory\ControllerFactory::class,
            Controller\ArquivoProjetoRepositorioController::class => \Base\Factory\ControllerFactory::class,
            Controller\CronogramaController::class => \Base\Factory\ControllerFactory::class,
            Controller\LicaoAprendidaController::class => \Base\Factory\ControllerFactory::class,
            Controller\PerfilController::class => \Base\Factory\ControllerFactory::class,
            Controller\RequisicaoCompraController::class => \Base\Factory\ControllerFactory::class,
            Controller\PrestacaoContaController::class => \Base\Factory\ControllerFactory::class,
            Controller\ExecucaoController::class => \Base\Factory\ControllerFactory::class,
            Controller\AemSgpController::class => \Base\Factory\ControllerFactory::class,
            Controller\NcbrController::class => \Base\Factory\ControllerFactory::class,
            Controller\AtpController::class => \Base\Factory\ControllerFactory::class,
            Controller\AndamentoComprasController::class => \Base\Factory\ControllerFactory::class,
            Controller\EncerramentoController::class => \Base\Factory\ControllerFactory::class,
            Controller\RelatoriosContabilidadeController::class => \Base\Factory\ControllerFactory::class,
            Controller\DashboardIniciacaoController::class => \Base\Factory\ControllerFactory::class,
            Controller\DashboardPlanejamentoController::class => \Base\Factory\ControllerFactory::class,
            Controller\DashboardExecucaoController::class => \Base\Factory\ControllerFactory::class,
            Controller\IndicadoresController::class => \Base\Factory\ControllerFactory::class,
            Controller\RelatoriosProjetoController::class => \Base\Factory\ControllerFactory::class,
            Controller\SageIniciativaController::class => \Base\Factory\ControllerFactory::class,
            Controller\SageAcaoController::class => \Base\Factory\ControllerFactory::class,
            Controller\SageFinalidadeController::class => \Base\Factory\ControllerFactory::class,
            Controller\ModuloRequisicaoController::class => \Base\Factory\ControllerFactory::class,
            Controller\DashboardMovimentacoesComprasController::class => \Base\Factory\ControllerFactory::class,
        )
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layoutSGP.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'navigation' => 'Laminas\Navigation\Service\DefaultNavigationFactory', // <-- add this
            'SGP\Service\index' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\Orcamento' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\Proposta' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\Projeto' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\SubProjeto' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\AguardandoAtivacao' => \Base\Factory\AbstractFactory::class,
            'Base\Service\InstanciaParecer' => \Base\Factory\AbstractFactory::class,
            'Base\Service\Fornecedor' => \Base\Factory\AbstractFactory::class,
            'Base\Service\Pessoa' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\Material' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\CusteioCapital' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\Bolsa' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\Contrapartida' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\Entrega' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\Cronograma' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\PartesInteressadas' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\Execucao' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\RequisicaoCompra' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\AemSgp' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\Ncbr' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\Atp' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\AndamentoCompras' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\LicaoAprendida' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\SageIniciativa' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\SageAcao' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\SageFinalidade' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\Mail' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\AditivoFinanciamento' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\RelatorioSemestral' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\RelatorioSemestralCronograma' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\RelatorioSemestralEquipe' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\RelatorioSemestralObjetivos' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\PropostaProjetoParceria' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\RelatorioSemestralRetornoSus' => \Base\Factory\AbstractFactory::class,
            'SGP\Service\ProjetoRepositorioArquivo' => \Base\Factory\AbstractFactory::class,
        ),
        'aliases' => array(
            'sgp-service-index' => 'SGP\Service\index',
            'sgp-service-orcamento' => 'SGP\Service\Orcamento',
            'sgp-service-proposta' => 'SGP\Service\Proposta',
            'sgp-service-projeto' => 'SGP\Service\Projeto',
            'sgp-service-subprojeto' => 'SGP\Service\SubProjeto',
            'sgp-service-aguardando-ativacao' => 'SGP\Service\AguardandoAtivacao',
            'sgp-service-projeto' => 'SGP\Service\Projeto',
            'base-service-instanciaParecer' => 'Base\Service\InstanciaParecer',
            'base-service-fornecedor' => 'Base\Service\Fornecedor',
            'base-service-pessoa' => 'Base\Service\Pessoa',
            'sgp-service-custeio-capital' => 'SGP\Service\CusteioCapital',
            'sgp-service-bolsa' => 'SGP\Service\Bolsa',
            'sgp-service-contrapartida' => 'SGP\Service\Contrapartida',
            'sgp-service-entrega' => 'SGP\Service\Entrega',
            'sgp-service-cronograma' => 'SGP\Service\Cronograma',
            'sgp-service-Partes-interessadas' => 'SGP\Service\PartesInteressadas',
            'sgp-service-execucao' => 'SGP\Service\Execucao',
            'sgp-service-requisicao-compra' => 'SGP\Service\RequisicaoCompra',
            'sgp-service-aem-sgp' => 'SGP\Service\AemSgp',
            'sgp-service-licao-aprendida' => 'SGP\Service\LicaoAprendida',
            'sgp-service-relatorio-semestral' => 'SGP\Service\RelatorioSemestral',
            'sgp-service-relatorio-semestral-cronograma' => 'SGP\Service\RelatorioSemestralCronograma',
            'sgp-service-relatorio-semestral-equipe' => 'SGP\Service\RelatorioSemestralEquipe',
            'sgp-service-relatorio-semestral-objetivos' => 'SGP\Service\RelatorioSemestralObjetivos',
            'sgp-service-proposta-projeto-parceria' => 'SGP\Service\PropostaProjetoParceria',
            'sgp-service-relatorio-semestral-retorno-sus' => 'SGP\Service\RelatorioSemestralRetornoSus',
            'sgp-service-projeto-repositorio-arquivo' => 'SGP\Service\ProjetoRepositorioArquivo',
        )
    ),
    
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                ),
            ),
        ),
        'configuration' => array(
            'orm_default' => array(
                'string_functions' => array(
                    'GroupConcat' => 'DoctrineExtensions\Query\Mysql\GroupConcat',
                    'Count' => 'DoctrineExtensions\Query\Mysql\CountIf',
                    'YEAR' => 'DoctrineExtensions\Query\Mysql\Year',
                    'DATEDIFF' => 'DoctrineExtensions\Query\Mysql\DateDiff',
                    'DATE_FORMAT' => 'DoctrineExtensions\Query\Mysql\DateFormat',
                    'SUBSTRING_INDEX' => 'DoctrineExtensions\Query\Mysql\SubstringIndex'
                )
            )
        )
    ),
);
