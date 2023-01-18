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
				'e_distribuzione' => [
					'label'            => 'E-Distribuzione',
					'children'         => [
						'new_connections' => 'Nuove Connessioni',
						'adjustments'     => 'Adeguamenti'
					],
					'documents'        => [
						'non_completi'    => 'Non completi',
						'in_preparazione' => 'In preparazione',
						'completi'        => 'Completi'
					],
					'question'         => [
						'non_eseguita'   => 'Non eseguita',
						'in_lavorazione' => 'In lavorazione',
						'eseguita'       => 'Eseguita',
						'inviata'        => 'Inviata'
					],
					'quotation'        => [
						'da_ricevere' => 'Da ricevere',
						'ricevuto'    => 'Ricevuto',
						'accettato'   => 'Accettato'
					],
					'start_of_process' => [
						'non_eseguita'   => 'Non eseguita',
						'in_lavorazione' => 'In lavorazione',
						'eseguita'       => 'Eseguita',
						'inviata'        => 'Inviata'
					],
					'end_of_process'   => [
						'non_eseguita'   => 'Non eseguita',
						'in_lavorazione' => 'In lavorazione',
						'eseguita'       => 'Eseguita',
						'inviata'        => 'Inviata'
					],
					'start_of_work'    => [
						'non_eseguita'   => 'Non eseguita',
						'in_lavorazione' => 'In lavorazione',
						'eseguita'       => 'Eseguita',
						'inviata'        => 'Inviata'
					],
					'end_of_work'      => [
						'non_eseguita'   => 'Non eseguita',
						'in_lavorazione' => 'In lavorazione',
						'eseguita'       => 'Eseguita',
						'inviata'        => 'Inviata'
					],
					'censimp'          => [
						'non_eseguita' => 'Non eseguita',
						'registrata'   => 'Registrata',
						'validata'     => 'Validata',
						'upnr'         => 'UPNR'
					],
					'rde'              => [
						'non_eseguita'   => 'Non eseguita',
						'in_lavorazione' => 'In lavorazione',
						'eseguita'       => 'Eseguita',
						'inviata'        => 'Inviata'
					],
					'measurement_card' => [
						'non_applicabile' => 'Non applicabile',
						'non_eseguita'    => 'Non eseguita',
						'in_lavorazione'  => 'In lavorazione',
						'eseguita'        => 'Eseguita',
						'inviata'         => 'Inviata'
					],
					'activation'       => [
						'non_eseguita' => 'Non eseguita',
						'eseguita'     => 'Eseguita',
					],
					'gse'              => [
						'non_eseguita'   => 'Non eseguita',
						'in_lavorazione' => 'In lavorazione',
						'eseguita'       => 'Eseguita',
						'inviata'        => 'Inviata'
					],
					'connection'       => [
						'cessione_parziale' => 'Cessione parziale',
						'ssp'               => 'SSP',
						'cessione_totale'   => 'Cessione totale'
					],
					'system_type'      => [
						'normale'        => 'Normale',
						'bonus'          => 'Bonus',
						'sconto_fattura' => 'Sconto fattura'
					],
				],
				'gse'             => [
					'label'     => 'GSE',
					'children'  => [
						'fuel_mix'  => 'Fuel Mix',
						'antimafia' => 'Antimafia',
						'invoices'  => 'Fatture',
						'seu'       => 'SEU',
						'siad'      => 'Siad',
						'checks'    => 'Controlli'
					],
					'fuel_mix'  => [
						'da_eseguire'    => 'Da eseguire',
						'in_lavorazione' => 'In lavorazione',
						'eseguita'       => 'Eseguita',
						'inviata'        => 'Inviata'
					],
					'antimafia' => [
						'da_rinnovare'   => 'Da rinnovare',
						'da_eseguire'    => 'Da eseguire',
						'in_lavorazione' => 'In lavorazione',
						'eseguita'       => 'Eseguita',
						'inviata'        => 'inviata',
					],
					'invoices'  => [
						'eseguita'     => 'Eseguita',
						'non_eseguita' => 'Non eseguita'
					],
					'seu'       => [
						'da_eseguire'    => 'Da eseguire',
						'in_lavorazione' => 'In lavorazione',
						'eseguita'       => 'Eseguita',
						'inviata'        => 'Inviata'
					]
				],
				'terna'           => [
					'label'    => 'Terna',
					'children' => [
						'g_stat' => 'G STAT'
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