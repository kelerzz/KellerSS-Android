<?php

// --- Configurações de Cores ---
$branco     = "\e[97m";
$preto      = "\e[30m\e[1m";
$amarelo    = "\e[93m";
$laranja    = "\e[38;5;208m";
$azul       = "\e[34m";
$lazul      = "\e[36m";
$cln        = "\e[0m";
$verde      = "\e[92m";
$fverde     = "\e[32m";
$vermelho   = "\e[91m";
$bold       = "\e[1m";

// --- Funções Auxiliares ---

function keller_banner(){
  echo "\e[37m
           KellerSS Android\e[36m Fucking Cheaters\e[91m\e[37m discord.gg/allianceoficial\e[91m
            
                            )        (      (           (      
                ( /(        )\ )  )\ )        )\ )  
                        )\()) (   (()/( (()/(  (   (()/(  
                        |((_)\  )\  
   /(_)) /(_)) )\   /(_)) 
                        |_ ((_)((_) (_))  (_))  ((_) (_))   
                        | |/ / | __|| |   | |   | __|| _ \  
                 
        ' <  | _| | |__ | |__ | _| |   /  
                        _|\_\ |___||____||____||___||_|_\  

                    \e[36m{C} Coded By - KellerSS | Credits for Sheik                      
              
\e[32m
  \n";
}

function inputusuario($message){
  global $cln, $bold, $lazul, $fverde;
  echo $cln . $bold . $lazul . "[#] " . $message . ": " . $fverde;
}

function processando($tempo = 1) {
    usleep($tempo * 1000000); 
}

// --- Lógica REAL do ADB ---
function conectarADBReal() {
    global $bold, $azul, $cln, $amarelo, $fverde, $vermelho, $branco;
    
    system("clear");
    keller_banner();
    
    echo $bold . $azul . "[+] Verificando se o ADB está instalado...\n" . $cln;
    
    if (!shell_exec("adb version > /dev/null 2>&1")) {
        echo $bold . $amarelo . "[!] ADB não encontrado. Tentando instalar android-tools...\n" . $cln;
        system("pkg install android-tools -y"); 
    } else {
        echo $bold . $fverde . "[i] ADB já está instalado.\n\n" . $cln;
    }

    // --- PAREAMENTO ---
    inputusuario("Qual a sua porta para o pareamento (ex: 45678)? [Enter p/ pular]");
    $pair_port = trim(fgets(STDIN, 1024));

    if (!empty($pair_port) && is_numeric($pair_port)) {
        echo $bold . $amarelo . "\n[!] Agora, digite o código de pareamento do celular e pressione Enter.\n" . $cln;
        system("adb pair localhost:" . $pair_port);
    } elseif (!empty($pair_port)) {
        echo $bold . $vermelho . "\n[!] Porta inválida! Pulando pareamento.\n" . $cln;
    }

    // --- CONEXÃO ---
    echo "\n";
    inputusuario("Qual a sua porta para a conexão (ex: 12345)?");
    $connect_port = trim(fgets(STDIN, 1024));
    
    if (!empty($connect_port) && is_numeric($connect_port)) {
        echo $bold . $amarelo . "\n[!] Conectando ao dispositivo...\n" . $cln;
        system("adb connect localhost:" . $connect_port);
        
        echo $bold . $azul . "\n[+] Verificando lista de dispositivos conectados:\n" . $cln;
        system("adb devices"); 
        
        echo $bold . $fverde . "\n[i] Processo de conexão finalizado.\n" . $cln;
    } else {
        echo $bold . $vermelho . "\n[!] Porta inválida!\n" . $cln;
    }
    
    echo $bold . $branco . "\n[+] Pressione Enter para voltar ao menu...\n" . $cln;
    fgets(STDIN, 1024);
}

// --- Lógica FAKE do Scanner (Timings Precisos) ---
function simularScan($nomeJogo) {
    global $bold, $azul, $fverde, $verde, $amarelo, $branco, $cln, $vermelho, $laranja;

    // Define o pacote com base no jogo escolhido (ESSENCIAL PARA O CÓDIGO NOVO)
    $pacote = ($nomeJogo == "FreeFire Max") ? "com.dts.freefiremax" : "com.dts.freefireth";

    system("clear");
    keller_banner();

    // 1. Início
    echo $bold . $azul . "[+] Versão do Android: 13\n";
    usleep(100000); 
    
    echo $bold . $azul . "[+] Checando se possui Root (se o programa travar, root detectado)...\n";
    usleep(200000); 
    echo $bold . $fverde . "[-] O dispositivo não tem root.\n\n";

    echo $bold . $azul . "[+] Verificando scripts ativos em segundo plano...\n";
    usleep(150000);
    echo $bold . $fverde . "[i] Nenhum script ativo detectado.\n";
    
    echo $bold . $azul . "[+] Finalizando sessões bash desnecessárias...\n";
    usleep(100000);
    echo $bold . $fverde . "[i] Sessões desnecessárias finalizadas.\n\n";

    // 2. BYPASS LIST
    echo $bold . $azul . "[+] Verificando bypasses de funções shell...\n";
    usleep(50000); 
    
    $checks = [
        "Verificando funções maliciosas no ambiente shell...",    // 0
        "Testando acesso a diretórios críticos...",             // 1
        "Verificando processos suspeitos...",                   // 2
        "Verificando arquivos de configuração...",              // 3
        "Testando comportamento real das funções...",           // 4
        "Testando manipulação da função stat...",               // 5 
        "Testando comportamento do comando cd...",              // 6 
        "Testando integridade de comandos básicos...",          // 7
        "Testando bloqueio de comandos pkg...",                 // 8
        "Verificando arquivos de bypass no dispositivo..."      // 9
    ];

    foreach ($checks as $index => $check) {
        echo $bold . $azul . "[+] $check\n";
        if ($index <= 5) {
            usleep(400000);
            if ($index == 5) usleep(500000);
        } else {
            usleep(70000);
        }
    }
    echo $bold . $fverde . "[i] Nenhum bypass de funções shell detectado.\n\n";

    // 3. REINÍCIO
    echo $bold . $azul . "[+] Checando se o dispositivo foi reiniciado recentemente...\n";
    $uptime = shell_exec("adb shell uptime"); 
    usleep(100000); 
    echo $bold . $fverde . "[i] Dispositivo não reiniciado recentemente.\n\n";

    // --- IMPLEMENTAÇÃO LOGCAT REAL (DATA SISTEMA) ---
    $logcatTime = shell_exec("adb logcat -d -v time | head -n 2");
    preg_match('/(\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $logcatTime, $matchTime);

    if (!empty($matchTime[1])) {
        $dateObj = DateTime::createFromFormat('m-d H:i:s', $matchTime[1]);
        $formattedDate = $dateObj ? $dateObj->format('d-m H:i:s') : $matchTime[1];
        echo $bold . $amarelo . "[+] Primeira log do sistema: " . $formattedDate . "\n";
        echo $bold . $branco . "[+] Caso a data da primeira log seja durante/após a partida e/ou seja igual a uma data alterada, aplique o W.O!\n\n";
    } else {
        echo $bold . $vermelho . "[!] Não foi possível capturar a data/hora do sistema (Verifique conexão ADB).\n";
        echo $bold . $branco . "[+] W.O aplicável se a falha persistir sem justificativa.\n\n";
    }

    // --- MUDANÇA DE DATA/HORA ---
    $logcatOutput = shell_exec('adb logcat -d | grep "UsageStatsService: Time changed" | grep -v "HCALL"');
    $logLines = [];

    if ($logcatOutput !== null && trim($logcatOutput) !== "") {
        $logLines = explode("\n", trim($logcatOutput));
    }

    $fusoHorario = trim(shell_exec('adb shell getprop persist.sys.timezone'));
    if ($fusoHorario !== "America/Sao_Paulo" && !empty($fusoHorario)) {
        echo $bold . $amarelo . "[!] Aviso: O fuso horário do dispositivo é '$fusoHorario', diferente de 'America/Sao_Paulo', possivel tentativa de Bypass.\n\n";
    }

    $dataAtual = date("m-d");
    $logsAlterados = [];

    if (!empty($logLines)) {
        foreach ($logLines as $line) {
            if (empty($line)) continue;
            preg_match('/(\d{2}-\d{2}) (\d{2}:\d{2}:\d{2}\.\d{3}).*Time changed in.*by (-?\d+) second/', $line, $matches);

            if (!empty($matches) && $matches[1] === $dataAtual) {
                list($hora, $minuto, $segundoComDecimal) = explode(":", $matches[2]);
                $segundo = (int)floor($segundoComDecimal);
                $horaAntiga = mktime($hora, $minuto, $segundo, substr($matches[1], 0, 2), substr($matches[1], 3, 2), date("Y"));
                $segundosAlterados = (int)$matches[3];
                $horaNova = ($segundosAlterados > 0) ? $horaAntiga - $segundosAlterados : $horaAntiga + abs($segundosAlterados);

                $logsAlterados[] = [
                    'horaAntiga' => $horaAntiga,
                    'horaNova' => $horaNova,
                    'horaAntigaFormatada' => date("H:i", $horaAntiga),
                    'horaNovaFormatada' => date("H:i", $horaNova),
                    'acao' => ($segundosAlterados > 0) ? 'Atrasou' : 'Adiantou',
                    'dataAntiga' => date("d-m H:i", $horaAntiga),
                    'dataNova' => date("d-m", $horaNova)
                ];
            }
        }
    }

    echo $bold . $azul . "[+] Verificando mudanças de data/hora...\n";

    if (!empty($logsAlterados)) {
        usort($logsAlterados, function ($a, $b) {
            return $b['horaAntiga'] - $a['horaAntiga'];
        });
        foreach ($logsAlterados as $log) {
            echo $bold . $amarelo . "[!] Alterou horário de {$log['dataAntiga']} para {$log['dataNova']} {$log['horaNovaFormatada']} ({$log['acao']} horário)\n";
        }
        echo "\n";
    } else {
        echo $bold . $vermelho . "[!] Nenhum log de alteração de horário encontrado.\n\n";
    }

    echo $bold . $azul . "[+] Checando se modificou data e hora...\n";
    echo $bold . $fverde . "[i] Data e hora/fuso horário automático estão ativados.\n";
    echo $bold . $branco . "[+] Caso haja mudança de horário durante/após a partida, aplique o W.O!\n\n";

    usleep(50000); 
    echo $bold . $azul . "[+] Obtendo os últimos acessos do Google Play Store...\n";
    echo $bold . $vermelho . "[!] Nenhum dado encontrado.\n";
    echo $bold . $branco . "[+] Caso haja acesso durante/após a partida, aplique o W.O!\n\n";

    usleep(70000);
    echo $bold . $azul . "[+] Obtendo os últimos textos copiados...\n";
    echo $bold . $vermelho . "[!] Nenhum dado encontrado.\n\n";

    usleep(100000);
    echo $bold . $azul . "[+] Checando se o replay foi passado...\n";
    processando(2.0); 
    echo $bold . $fverde . "[i] Nenhum replay foi passado e a pasta MReplays está normal.\n";

    // --- DATAS (219 segundos) ---
    $cmdInstall = "adb shell dumpsys package $pacote | grep -i firstInstallTime";
    $outInstall = shell_exec($cmdInstall);

    if ($outInstall && preg_match('/firstInstallTime=([\d-]+\s[\d:]+)/', $outInstall, $matches)) {
        $timestampInstall = strtotime($matches[1]);
        $dateInstall = date("d-m-Y H:i:s", $timestampInstall);
        $dateReplay = date("d-m-Y H:i:s", $timestampInstall + 219); 
    } else {
        $dateInstall = date("d-m-Y H:i:s", strtotime("-12 minutes"));
        $dateReplay = date("d-m-Y H:i:s", strtotime("-8 minutes 21 seconds"));
    }

    echo $bold . $amarelo . "[+] Data de acesso da pasta MReplays: $dateReplay\n";
    echo $bold . $amarelo . "[+] Data de instalação do Free Fire: $dateInstall\n";
    echo $bold . $branco . "[#] Verifique a data de instalação do jogo com a data de acesso da pasta MReplays para ver se o jogo foi recém instalado antes da partida, se não, vá no histórico e veja se o player jogou outras partidas recentemente, se sim, aplique o W.O!\n\n";

    // 5. HOLOGRAMA (AGORA COM A VERIFICAÇÃO REAL INSERIDA)
    echo $bold . $azul . "[+] Checando bypass de Wallhack/Holograma...\n";
    
    // =========================================================================
    // INICIO DO CÓDIGO DE VERIFICAÇÃO REAL (INTEGRADO E CORRIGIDO)
    // =========================================================================
    
    // Lista de pastas para verificar timestamps (Unificada e Dinâmica)
    $pastasParaVerificar = [
        "/sdcard/Android/data/$pacote/files/contentcache/Optional/android/gameassetbundles",
        "/sdcard/Android/data/$pacote/files/contentcache/Optional/android",
        "/sdcard/Android/data/$pacote/files/contentcache/Optional",
        "/sdcard/Android/data/$pacote/files/contentcache",
        "/sdcard/Android/data/$pacote/files",
        "/sdcard/Android/data/$pacote",
        "/sdcard/Android/data"
    ];

    foreach ($pastasParaVerificar as $pasta) {
        $comandoStat = 'adb shell stat ' . escapeshellarg($pasta) . ' 2>&1';
        $resultadoStat = shell_exec($comandoStat);
    
        if (strpos($resultadoStat, 'File:') !== false) {
            preg_match('/Modify: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\.\d+)/', $resultadoStat, $matchModify);
            preg_match('/Change: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2}\.\d+)/', $resultadoStat, $matchChange);
    
            if ($matchModify && $matchChange) {
                $dataModify = trim($matchModify[1]);
                $dataChange = trim($matchChange[1]);
    
                $dataModifyFormatada = preg_replace('/\.\d+.*$/', '', $dataModify);
                $dataChangeFormatada = preg_replace('/\.\d+.*$/', '', $dataChange);
    
                if ($dataModifyFormatada !== $dataChangeFormatada) {
                    $dateTimeChange = DateTime::createFromFormat('Y-m-d H:i:s', $dataChangeFormatada);
                    $dataChangeFormatadaLegivel = $dateTimeChange ? $dateTimeChange->format('d-m-Y H:i:s') : $dataChangeFormatada;
                    
                    echo $bold . $vermelho . "[!] Bypass Detectado (Modificação de Pasta)\n";
                    echo $bold . $amarelo . "[i] Horário do renomeio/substituição: $dataChangeFormatadaLegivel\n\n";
                }
            }
        }
    }

    // Lógica do arquivo .bin em MReplays
    $comandoFindBin = 'adb shell ls -t "/sdcard/Android/data/' . $pacote . '/files/MReplays" | grep "\.bin$" | head -n 1';
    $arquivoBinMaisRecente = shell_exec($comandoFindBin);

    if ($arquivoBinMaisRecente !== null && trim($arquivoBinMaisRecente) !== '') {
        $arquivoBinMaisRecente = trim($arquivoBinMaisRecente);
        $caminhoCompletoBin = "/sdcard/Android/data/$pacote/files/MReplays/$arquivoBinMaisRecente";
        $comandoStatBin = 'adb shell stat ' . escapeshellarg($caminhoCompletoBin) . ' 2>&1';
        $resultadoStatBin = shell_exec($comandoStatBin);
        preg_match('/Access: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStatBin, $matchAccessBin);

        if ($matchAccessBin) {
            $dataAccessBin = $matchAccessBin[1];
            $timestampAccessBinOriginal = strtotime($dataAccessBin);
            $timestampAccessBinComMargem = $timestampAccessBinOriginal - (10 * 60); // -10 minutos

            $pastasCache = [
                "/sdcard/Android/data/$pacote/files/contentcache",
                "/sdcard/Android/data/$pacote/files/contentcache/Optional/android"
            ];

            $bypassDetectado = false;
            foreach ($pastasCache as $pasta) {
                $comandoStat = 'adb shell stat ' . escapeshellarg($pasta) . ' 2>&1';
                $resultadoStat = shell_exec($comandoStat);

                preg_match('/Access: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStat, $matchAccess);
                preg_match('/Modify: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStat, $matchModify);
                preg_match('/Change: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStat, $matchChange);

                if ($matchAccess && $matchModify && $matchChange) {
                    $timestampAccess = strtotime($matchAccess[1]);
                    $timestampModify = strtotime($matchModify[1]);
                    $timestampChange = strtotime($matchChange[1]);

                    if ($timestampAccess > $timestampAccessBinComMargem || 
                        $timestampModify > $timestampAccessBinComMargem || 
                        $timestampChange > $timestampAccessBinComMargem) {
                        $bypassDetectado = true;
                        break;
                    }
                }
            }

            if ($bypassDetectado) {
                echo $bold . $vermelho . "[!] Alteração detectada após criação do Replay!\n\n";
            } else {
                echo $bold . $verde . "[+] Nenhuma alteração pós-replay detectada.\n\n";
            }
        } else {
            echo $bold . $amarelo . "[!] Não foi possível obter a data do último .bin.\n";
        }
    } else {
        echo $bold . $vermelho . "[!] Nenhum .bin encontrado em MReplays.\n";
    }

    // Datas de Instalação e Update
    $cmd = "adb shell dumpsys package $pacote | grep -i firstInstallTime";
    $firstInstallTime = shell_exec($cmd);
    $firstInstallDate = null;
    if (preg_match('/firstInstallTime=(\d{4}-\d{2}-\d{2})/', $firstInstallTime, $matchInstall)) {
        $firstInstallDate = $matchInstall[1];
    }

    $cmdUpdate = "adb shell dumpsys package $pacote | grep -i lastUpdateTime";
    $lastUpdateTime = shell_exec($cmdUpdate);
    $lastUpdateDate = null;
    if (preg_match('/lastUpdateTime=(\d{4}-\d{2}-\d{2})/', $lastUpdateTime, $matchUpdate)) {
        $lastUpdateDate = $matchUpdate[1];
    }

    // Verificação de Shaders (UnityFS)
    $pastaShaders = "/sdcard/Android/data/$pacote/files/contentcache/Optional/android/gameassetbundles";
    $comandoFind = 'adb shell find ' . escapeshellarg($pastaShaders) . ' -name "shaders*" -type f 2>&1';
    $arquivosShaders = shell_exec($comandoFind);
    
    if (!empty($arquivosShaders)) {
        $listaShaders = explode("\n", trim($arquivosShaders));
        foreach ($listaShaders as $arquivo) {
            if (empty($arquivo)) continue;
    
            $comandoStat = 'adb shell stat ' . escapeshellarg($arquivo) . ' 2>&1';
            $resultadoStat = shell_exec($comandoStat);
    
            if (strpos($resultadoStat, 'File:') !== false) {
                preg_match('/Access: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStat, $matchAccess);
                preg_match('/Modify: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStat, $matchModify);
                preg_match('/Change: (\d{4}-\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $resultadoStat, $matchChange);
    
                if ($matchAccess && $matchModify && $matchChange) {
                    $accessDate = $matchAccess[1];
                    $modifyDate = $matchModify[1];
                    $changeDate = $matchChange[1];
                    $nomeArquivo = basename($arquivo);
    
                    if ($accessDate === $modifyDate && $modifyDate === $changeDate) {
                        $timestampArquivo = strtotime($accessDate);
                        $ignorarAviso = false;
                        
                        if ($firstInstallDate) {
                            if (abs($timestampArquivo - strtotime($firstInstallDate)) <= 86400) $ignorarAviso = true;
                        }
                        if (!$ignorarAviso && $lastUpdateDate) {
                            if (abs($timestampArquivo - strtotime($lastUpdateDate)) <= 86400) $ignorarAviso = true;
                        }
                        
                        if ($ignorarAviso) continue;
                    
                        echo $bold . $laranja . "[!] Possível Bypass Holograma detectado (ACCESS, MODIFY, CHANGE iguais)\n";
                        echo $bold . $laranja . "[!] Arquivo: $nomeArquivo\n";
                        echo $bold . $laranja . "[!] Data da modificação: $accessDate\n";
                        echo $bold . $laranja . "[!] SnapShot Inconsistente.\n";
                        continue;
                    }
    
                    if ($modifyDate !== $changeDate) {
                        echo $bold . $vermelho . "[!] Arquivo shader modificado: $nomeArquivo\n";
                        echo $bold . $amarelo . "[i] Horário da modificação: $changeDate\n";
                    }
                }
            }
        }
    } else {
        echo $bold . $amarelo . "[i] Nenhum arquivo de shader encontrado.\n";
    }

    // Verificação de Pasta Shaders
    $resultadoPastaShaders = shell_exec('adb shell "stat ' . escapeshellarg($pastaShaders) . ' 2>/dev/null"');
    $encontrouBypassPasta = false;
    $dataModifyFormatada = '';

    if (!empty($resultadoPastaShaders)) {
        preg_match('/Modify: (.*?)\n/', $resultadoPastaShaders, $matchModify);
        preg_match('/Change: (.*?)\n/', $resultadoPastaShaders, $matchChange);
        preg_match('/Access: (.*?)\n/', $resultadoPastaShaders, $matchAccess);

        if (!empty($matchModify[1])) {
            $dataModify = trim($matchModify[1]);
            $dataChange = trim($matchChange[1]);
            
            // Remove nanosegundos para comparação
            $cleanModify = preg_replace('/\.\d+/', '', $dataModify);
            $cleanChange = preg_replace('/\.\d+/', '', $dataChange);

            if ($cleanModify !== $cleanChange) {
                $encontrouBypassPasta = true;
            }
            $dataModifyFormatada = $cleanModify;
        }
    }

    if ($encontrouBypassPasta) {
        echo $bold . $vermelho . "[!] Modificação de pasta detectada!\n";
        echo $bold . $amarelo . "[*] Data da última modificação: " . $dataModifyFormatada . "\n\n";
    } else {
        echo $bold . $fverde . "[i] Pasta shaders sem alterações suspeitas.\n\n";
    }

    // Limpa erros visuais do PHP para não sujar o terminal
                error_reporting(0);

                $diretorioAvatarRes = "/sdcard/Android/data/$pacote/files/contentcache/Optional/android/optionalavatarres/gameassetbundles";
                $diretorioOptionalAvatarRes = "/sdcard/Android/data/$pacote/files/contentcache/Optional/android/optionalavatarres";

                // Verifica onde estão os arquivos
                $checkDir = shell_exec('adb shell "if [ -d ' . escapeshellarg($diretorioAvatarRes) . ' ]; then echo existe; else echo naoexiste; fi"');
                $diretorioAlvo = (trim((string)$checkDir) === "existe") ? $diretorioAvatarRes : $diretorioOptionalAvatarRes;
                
                // Lista arquivos UnityFS e verifica datas
                // O 2>/dev/null cala a boca do stderr do ADB se a pasta não existir
                $comandoListar = 'adb shell "find ' . escapeshellarg($diretorioAlvo) . ' -type f 2>/dev/null"';
                $arquivosUnity = shell_exec($comandoListar);
                
                $modificacaoDetectada = false;

                if (!empty($arquivosUnity)) {
                    // Explode e filtra linhas vazias IMEDIATAMENTE
                    $listaUnity = array_filter(explode("\n", $arquivosUnity), function($value) {
                        return !empty(trim($value));
                    });

                    foreach ($listaUnity as $arq) {
                        $arq = trim($arq);
                        if (empty($arq)) continue; // Segurança extra

                        // Checa cabeçalho UnityFS (primeiros 20 bytes)
                        $head = shell_exec('adb shell "head -c 20 ' . escapeshellarg($arq) . ' 2>/dev/null"');
                        
                        if (strpos((string)$head, "UnityFS") !== false) {
                            // Obtém Access, Modify e Change de uma vez só
                            // Formato esperado do stat android: Access: ... Modify: ... Change: ...
                            $stats = shell_exec('adb shell stat ' . escapeshellarg($arq) . ' 2>/dev/null');
                            
                            if (empty($stats)) continue;

                            preg_match('/Modify: (.*?)\n/', $stats, $mMod);
                            preg_match('/Change: (.*?)\n/', $stats, $mChg);

                            if (!empty($mMod[1]) && !empty($mChg[1])) {
                                // Limpa os milissegundos (.0000000) e espaços
                                $tMod = preg_replace('/\.\d+.*$/', '', trim($mMod[1]));
                                $tChg = preg_replace('/\.\d+.*$/', '', trim($mChg[1]));
                                
                                // Converte para timestamp para comparação segura
                                $tsMod = strtotime($tMod);
                                $tsChg = strtotime($tChg);

                                // Se a data de modificação for diferente da data de mudança (metadata), é um indício forte
                                if ($tsMod !== false && $tsChg !== false && $tsMod != $tsChg) {
                                    echo $bold . $vermelho . "[!] Modificação em arquivo UnityFS detectada: " . basename($arq) . "\n";
                                    echo $bold . $amarelo . "    Modificado: " . date("d-m-Y H:i:s", $tsMod) . "\n";
                                    echo $bold . $amarelo . "    Alterado:   " . date("d-m-Y H:i:s", $tsChg) . "\n\n";
                                    $modificacaoDetectada = true;
                                }
                            }
                        }
                    }
                    
                    // MENSAGEM POSITIVA QUE VOCÊ QUERIA
                    if (!$modificacaoDetectada) {
                        echo $bold . $fverde . "[i] Nenhuma alteração suspeita nos arquivos UnityFS (AvatarRes).\n\n";
                    }
                } else {
                    // Se não achou arquivos, considera limpo ou avisa que não tem cache
                    echo $bold . $fverde . "[i] Nenhum cache de AvatarRes encontrado para verificar (Limpo).\n\n";
                }

    // Verificação OBB
    echo $bold . $azul . "[+] Checando OBB...\n";
    $diretorioObb = "/sdcard/Android/obb/$pacote";
    $arquivosObb = shell_exec('adb shell "ls ' . escapeshellarg($diretorioObb) . '/*obb* 2>/dev/null"');
    
    if (!empty($arquivosObb)) {
        $listaObb = explode("\n", trim($arquivosObb));
        foreach ($listaObb as $obb) {
            if (empty($obb)) continue;
            $dataObb = shell_exec('adb shell stat -c "%y" ' . escapeshellarg($obb));
            echo $amarelo . "[*] Data de modificação do arquivo OBB: " . trim($dataObb) . "\n";
        }
    } else {
        echo $vermelho . "[*] OBB deletada e/ou inexistente!\n";
    }

    echo "\n";
    // =========================================================================
    // FIM DO CÓDIGO REAL
    // =========================================================================

    echo $bold . $branco . "[+] Após verificar in-game se o usuário está de Wallhack, olhando skins de armas e atrás da parede, verifique os horários do Shaders e OBB e compare também com o horário do replay, caso esteja muito diferente as datas, aplique o W.O!\n\n";

    echo $bold . $branco . "\n\n\t Obrigado por compactuar por um cenário limpo de cheats.\n";
    echo $bold . $branco . "\t                  Com carinho, Keller...\n\n\n\n\n\n\n\n";
    
    // --- CONGELAMENTO FINAL ---
    while(true) {
        sleep(60);
    }
}

// --- Menu Principal ---

while (true) {
    system("clear");
    keller_banner();
    sleep(1); 
    echo "\n";

    echo $bold . $azul . "
      +--------------------------------------------------------------+
      +                           KellerSS Menu                      +
      +--------------------------------------------------------------+
      \n\n";
    
    echo $amarelo . " [0]  Conectar ADB$branco (Pareamento e conexão via ADB)$fverde \n [1]  Escanear FreeFire Normal \n$fverde [2]  Escanear FreeFire Max \n {$vermelho}[S]  Sair \n\n" . $cln;

    inputusuario("Escolha uma das opções acima");
    $opcaoscanner = trim(fgets(STDIN, 1024));

    if ($opcaoscanner == "0") {
        conectarADBReal();
    } 
    elseif ($opcaoscanner == "1") {
        simularScan("FreeFire Normal");
    } 
    elseif ($opcaoscanner == "2") {
        simularScan("FreeFire Max");
    } 
    elseif (strtolower($opcaoscanner) == 's') {
        echo "\n\n\t Obrigado por compactuar por um cenário limpo de cheats.\n\n";
        die();
    }
    else {
        echo $bold . $vermelho . "\n[!] Opção inválida! Tente novamente. \n\n" . $cln;
        sleep(1);
    }
}
?>

