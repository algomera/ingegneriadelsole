<?php
	return [
		'customer'    => [
			'types' => [
				'private' => 'Privato',
				'company' => 'Azienda'
			]
		],
		'credentials' => [
			'types' => [
				'e-distribuzione' => 'E-distribuzione',
				'terna'           => 'Terna',
				'gse'             => 'GSE',
				'altro'           => 'Altro'
			]
		],
		'system'      => [
			'connections' => [
				'cessione_totale'   => 'Cessione Totale',
				'cessione_parziale' => 'Cessione Parziale',
				'scambio_sul_posto' => 'Scambio sul posto',
				'vendita_seu'       => 'Vendita SEU'
			],
			'incentives'  => [
				'1'       => 'I',
				'2'       => 'II',
				'3'       => 'III',
				'4'       => 'IV',
				'5'       => 'V',
				'altro'   => 'Altro',
				'nessuno' => 'Nessuno'
			],
			'sales'       => [
				'gse'    => 'GSE',
				'trader' => 'Trader'
			],
			'sections'    => [
				'adm'             => [
					'label'       => 'AdM',
					'children'    => [
						'proxy_compilation'      => 'Delega Compilazione',
						'proxy_subscription'     => 'Delega Sottoscrizione',
						'declaration'            => 'Dichiarazione',
						'register_request'       => 'Richiesta Registro',
						'triennial_verification' => 'Verifica Triennale'
					],
					'declaration' => [
						'da_eseguire'    => 'Da eseguire',
						'in_lavorazione' => 'In lavorazione',
						'eseguita'       => 'Eseguita',
						'inviata'        => 'Inviata'
					],
					'register'    => [
						'da_richiedere'   => 'Da richiedere',
						'non_applicabile' => 'Non applicabile',
						'richiesto'       => 'Richiesto',
						'ritirato'        => 'Ritirato'
					]
				],
				'arera'           => [
					'label'         => 'Arera',
					'children'      => [
						'proxy_arera'        => 'Arera Delega',
						'contribution'       => 'Contributo',
						'investigation'      => 'Indagine',
						'unbundling_support' => 'Assistenza Unbundling'
					],
					'contribution'  => [
						'non_eseguita'   => 'Non eseguita',
						'in_lavorazione' => 'In lavorazione',
						'eseguita'       => 'Eseguita',
						'inviata'        => 'Inviata'
					],
					'investigation' => [
						'non_eseguita'   => 'Non eseguita',
						'in_lavorazione' => 'In lavorazione',
						'eseguita'       => 'Eseguita',
						'inviata'        => 'Inviata'
					],
					'unbundling'    => [
						'non_eseguita'   => 'Non eseguita',
						'in_lavorazione' => 'In lavorazione',
						'eseguita'       => 'Eseguita',
						'inviata'        => 'Inviata'
					]
				],
				'gse'             => [
					'label'    => 'GSE',
					'children' => [
						'fuel_mix'  => 'Fuel Mix',
						'antimafia' => 'Antimafia',
						'invoices'  => 'Fatture',
						'seu'       => 'SEU',
						'siad'      => 'Siad',
						'checks'    => 'Controlli'
					]
				],
				'terna'           => [
					'label'    => 'Terna',
					'children' => [
						'g_stat' => 'G STAT'
					]
				],
				'e_distribuzione' => [
					'label'    => 'E-Distribuzione',
					'children' => [
						'new_concessions' => 'Nuove Concessioni',
						'adjustments'     => 'Adeguamenti'
					]
				],
				'reconciliation'  => [
					'label' => 'Riconciliazione'
				],
				'maintenance'     => [
					'label' => 'Manutenzione'
				],
				'ceo_management'  => [
					'label' => 'Gestione CEO'
				]
			]
		]
	];