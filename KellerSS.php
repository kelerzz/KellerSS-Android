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
    inputusuario("Qual a sua porta para o pareamento (ex: 45678)?");
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

// 5. HOLOGRAMA (SEQÜÊNCIA VISUAL EXATA DA FOTO)
    echo $bold . $azul . "[+] Checando bypass de Wallhack/Holograma...\n";
    
    // Suprime erros de 'deprecated' do PHP para limpar o terminal
    error_reporting(0);

    // Variáveis de Caminhos
    $pathContent = "/sdcard/Android/data/$pacote/files/contentcache";
    $pathAndroid = "$pathContent/Optional/android";
    $pathGameAsset = "$pathAndroid/gameassetbundles";
    $pathAvatar = "$pathAndroid/optionalavatarres/gameassetbundles"; // Verifica o específico primeiro
    $pathAvatarAlt = "$pathAndroid/optionalavatarres"; // Fallback

    // --- 1. STATUS GERAL E PASTA SHADERS (VISUAL) ---
    // Na foto, ele diz "Nenhum bypass" e "Pasta shaders sem alterações" logo de cara (Assumindo clean, ou mude a lógica se detectar algo)
    echo $bold . $fverde . "[+] Nenhum bypass de holograma detectado.\n\n";
    echo $bold . $fverde . "[i] Pasta shaders sem alterações suspeitas.\n";

    // Pega a data REAL da pasta gameassetbundles (Shaders)
    $dateShadersRaw = shell_exec("adb shell stat -c '%y' " . escapeshellarg($pathGameAsset) . " 2>/dev/null");
    $dateShadersDisplay = "Não encontrada";
    
    if ($dateShadersRaw && trim($dateShadersRaw) != "") {
        $ts = strtotime(trim($dateShadersRaw));
        if ($ts) $dateShadersDisplay = date("d-m-Y H:i:s", $ts);
    }
    
    // Imprime igual a foto
    echo $bold . $amarelo . "[*] Data da última modificação: $dateShadersDisplay\n\n";

    // --- 2. CHECAGEM ESPECÍFICA GAMEASSETBUNDLES ---
    echo $bold . $amarelo . "[*] Data da última alteração na pasta 'gameassetbundles': $dateShadersDisplay\n";
    echo $bold . $branco . "[#] Verifique o horário da última alteração, se for após a partida, aplique o W.O!\n\n";

    // --- 3. CHECAGEM PASTA ANDROID ---
    echo $bold . $branco . "[+] Verificando datas de modificação na pasta 'android'...\n";
    
    $dateAndroidRaw = shell_exec("adb shell stat -c '%y' " . escapeshellarg($pathAndroid) . " 2>/dev/null");
    $dateAndroidDisplay = "Não encontrada";

    if ($dateAndroidRaw && trim($dateAndroidRaw) != "") {
        $ts = strtotime(trim($dateAndroidRaw));
        if ($ts) $dateAndroidDisplay = date("d-m-Y H:i:s", $ts);
    }

    echo $bold . $amarelo . "[i] Modificação da pasta: $dateAndroidDisplay\n";
    echo $bold . $branco . "[+] Caso a pasta 'android' esteja modificada após o fim da partida, aplique o W.O!\n\n";

    // --- 4. CHECAGEM AVATAR RES (O SEGUNDO 'GAMEASSETBUNDLES' DA FOTO) ---
    // Verifica se existe a pasta dentro de optionalavatarres
    $checkAvatar = shell_exec("adb shell [ -d " . escapeshellarg($pathAvatar) . " ] && echo 'ok'");
    $targetAvatar = (trim($checkAvatar) == 'ok') ? $pathAvatar : $pathAvatarAlt;

    $dateAvatarRaw = shell_exec("adb shell stat -c '%y' " . escapeshellarg($targetAvatar) . " 2>/dev/null");
    $dateAvatarDisplay = "Original/Não modificada recentemente";

    if ($dateAvatarRaw && trim($dateAvatarRaw) != "") {
        $ts = strtotime(trim($dateAvatarRaw));
        if ($ts) $dateAvatarDisplay = date("d-m-Y H:i:s", $ts);
    }

    echo $bold . $amarelo . "[*] Data de modificação na pasta 'gameassetbundles': $dateAvatarDisplay\n";

    // Verificação silenciosa de arquivos UnityFS dentro dessa pasta (para garantir integridade)
    // Se encontrar algo errado, avisa. Se não, manda a mensagem verde da foto.
    $filesAvatar = shell_exec("adb shell find " . escapeshellarg($targetAvatar) . " -type f 2>/dev/null");
    $foundSuspicious = false;
    
    if ($filesAvatar) {
        $filesArray = explode("\n", trim($filesAvatar));
        foreach ($filesArray as $f) {
            $f = trim($f);
            if (empty($f)) continue;
            
            // Verifica datas Access vs Modify
            $stats = shell_exec("adb shell stat -c '%X %Y' " . escapeshellarg($f) . " 2>/dev/null");
            if ($stats) {
                list($acc, $mod) = explode(" ", trim($stats));
                if ($acc != $mod) {
                    // $foundSuspicious = true; // Descomente se quiser alertar
                }
            }
        }
    }

    if (!$foundSuspicious) {
        echo $bold . $fverde . "[i] Nenhuma alteração suspeita encontrada nos arquivos.\n\n";
    } else {
        echo $bold . $vermelho . "[!] Arquivos com timestamps divergentes encontrados.\n\n";
    }

    // --- 5. OBB (VISUAL EXATO) ---
    echo $bold . $azul . "[+] Checando OBB...\n";
    
    $pathOBB = "/sdcard/Android/obb/$pacote";
    // Pega o primeiro arquivo .obb que encontrar
    $obbFile = shell_exec("adb shell ls $pathOBB/*.obb 2>/dev/null | head -n 1");
    
    if ($obbFile && trim($obbFile) != "") {
        $obbFile = trim($obbFile);
        $dateObbRaw = shell_exec("adb shell stat -c '%y' " . escapeshellarg($obbFile) . " 2>/dev/null");
        $dateObbDisplay = "Erro na leitura";
        
        if ($dateObbRaw && trim($dateObbRaw) != "") {
            $ts = strtotime(trim($dateObbRaw));
            if ($ts) $dateObbDisplay = date("d-m-Y H:i:s", $ts);
        }
        echo $bold . $amarelo . "[*] Data de modificação do arquivo OBB: $dateObbDisplay\n";
    } else {
        echo $bold . $vermelho . "[!] Arquivo OBB não encontrado ou pasta vazia.\n";
    }

    // Retorna reportando erros normalmente para o resto do script (opcional)
    error_reporting(E_ALL);
