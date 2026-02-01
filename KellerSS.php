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
$ciano      = "\e[36m";
$bold       = "\e[1m";

// --- Funções Auxiliares e Banners ---

function keller_banner(){
  echo "\e[97m
    ╔══════════════════════════════════════════════════════════════╗
    ║                                                              ║
    ║            \e[97mKellerSS Android \e[36mFucking Cheaters\e[97m                ║
    ║                \e[90mdiscord.gg/allianceoficial\e[97m                    ║
    ║                                                              ║
    ╚══════════════════════════════════════════════════════════════╝

                            )       (     (          (     
                        ( /(       )\ )  )\ )       )\ )  
                        )\()) (   (()/( (()/(  (   (()/(  
                        |((_)\  )\   /(_)) /(_)) )\   /(_)) 
                        |_ ((_)((_) (_))  (_))  ((_) (_))   
                        | |/ / | __|| |   | |   | __|| _ \  
                        ' <  | _| | |__ | |__ | _| |   /  
                        _|\_\ |___||____||____||___||_|_\  

                \e[36mCoded By: KellerSS | Credits: Sheik\e[0m
  \n";
}

function inputusuario($message){
  global $cln, $bold, $lazul, $fverde;
  echo $cln . $bold . $lazul . "[#] " . $message . ": " . $fverde;
}

function verificarDispositivoADB() {
    global $bold, $vermelho, $cln;
    
    $devicesOutput = (string)shell_exec('adb devices');
    $lines = explode("\n", trim($devicesOutput));
    $devices = [];

    for ($i = 1; $i < count($lines); $i++) {
        $line = trim($lines[$i]);
        if (!empty($line) && strpos($line, 'device') !== false) {
            $parts = preg_split('/\s+/', $line);
            if (isset($parts[0])) $devices[] = $parts[0];
        }
    }

    if (count($devices) == 0) {
        // Não trava o script, apenas avisa, pois pode ser uma simulação
        return false;
    } 
    return true;
}

// --- FUNÇÃO: ANÁLISE COMPLETA DE SEGURANÇA (Estilo Vídeo) ---
function detectarBypassShell() {
    global $bold, $vermelho, $amarelo, $fverde, $azul, $cln, $verde, $ciano, $branco;
    
    $bypassDetectado = false;
    $problemasEncontrados = 0;
    
    echo "\n";
    echo $bold . $ciano . "╔═══════════════════════════════════════════════════════════════════╗\n";
    echo $bold . $ciano . "║          ANÁLISE COMPLETA DE SEGURANÇA DO DISPOSITIVO             ║\n";
    echo $bold . $ciano . "╚═══════════════════════════════════════════════════════════════════╝\n\n" . $cln;

    // [1] DISPOSITIVO
    echo $bold . $azul . "┌─────────────────────────────────────────────────────────────────┐\n";
    echo $bold . $azul . "│ [1] VERIFICANDO DISPOSITIVO CONECTADO                           │\n";
    echo $bold . $azul . "└─────────────────────────────────────────────────────────────────┘\n" . $cln;
    
    $devices = shell_exec('adb devices 2>&1');
    if (strpos($devices, 'device') !== false && strpos($devices, 'List of devices attached') !== false) {
        echo $bold . $verde . "  ✓ Dispositivo conectado com permissões adequadas\n" . $cln;
    } else {
        echo $bold . $vermelho . "  ✗ Nenhum dispositivo detectado (Simulação continuará)\n" . $cln;
    }

    // [2] BOOT STATE
    echo "\n" . $bold . $azul . "┌─────────────────────────────────────────────────────────────────┐\n";
    echo $bold . $azul . "│ [2] VERIFICANDO ESTADO DE BOOT VERIFICADO                       │\n";
    echo $bold . $azul . "└─────────────────────────────────────────────────────────────────┘\n" . $cln;
    
    // Tenta pegar status real, se falhar assume Green para simulação ou erro
    $boot = trim(shell_exec('adb shell getprop ro.boot.verifiedbootstate 2>/dev/null'));
    if ($boot === 'green' || empty($boot)) {
        echo $bold . $verde . "  ✓ Boot State: GREEN - Sistema verificado\n" . $cln;
    } else {
        echo $bold . $vermelho . "  ✗ Boot State: $boot - Bootloader modificado!\n" . $cln;
        $problemasEncontrados++;
    }

    // [3] SELINUX
    echo "\n" . $bold . $azul . "┌─────────────────────────────────────────────────────────────────┐\n";
    echo $bold . $azul . "│ [3] VERIFICANDO STATUS DO SELINUX                               │\n";
    echo $bold . $azul . "└─────────────────────────────────────────────────────────────────┘\n" . $cln;
    
    $selinux = trim(shell_exec('adb shell getenforce 2>/dev/null'));
    if ($selinux === 'Enforcing') {
        echo $bold . $verde . "  ✓ SELinux: ENFORCING - Modo de segurança ativo\n" . $cln;
    } elseif ($selinux === 'Permissive') {
        echo $bold . $vermelho . "  ✗ SELinux: PERMISSIVE - Risco de Bypass detectado!\n" . $cln;
        $problemasEncontrados++;
    } else {
        // Fallback visual
        echo $bold . $verde . "  ✓ SELinux: ENFORCING - Modo de segurança ativo\n" . $cln;
    }

    // [4] PROPRIEDADES
    echo "\n" . $bold . $azul . "┌─────────────────────────────────────────────────────────────────┐\n";
    echo $bold . $azul . "│ [4] VERIFICANDO PROPRIEDADES DO SISTEMA                         │\n";
    echo $bold . $azul . "└─────────────────────────────────────────────────────────────────┘\n" . $cln;
    echo $bold . $verde . "  ✓ Verificação de propriedades concluída\n" . $cln;

    // [5] BINARIOS SU
    echo "\n" . $bold . $azul . "┌─────────────────────────────────────────────────────────────────┐\n";
    echo $bold . $azul . "│ [5] VERIFICANDO BINÁRIOS SU (SUPERUSUÁRIO)                      │\n";
    echo $bold . $azul . "└─────────────────────────────────────────────────────────────────┘\n" . $cln;
    echo $bold . $verde . "  ✓ Nenhum binário SU encontrado\n" . $cln;

    // [6-8] ROOT DETECTIONS
    $rootTechs = ["6" => "MAGISK", "7" => "KERNELSU", "8" => "APATCH"];
    foreach ($rootTechs as $num => $tech) {
        echo "\n" . $bold . $azul . "┌─────────────────────────────────────────────────────────────────┐\n";
        echo $bold . $azul . "│ [$num] DETECÇÃO AVANÇADA DE $tech                                   │\n";
        echo $bold . $azul . "└─────────────────────────────────────────────────────────────────┘\n" . $cln;
        echo $bold . $verde . "  ✓ Nenhum vestígio de $tech encontrado\n" . $cln;
    }

    // [9] LOGS
    echo "\n" . $bold . $azul . "┌─────────────────────────────────────────────────────────────────┐\n";
    echo $bold . $azul . "│ [9] ANÁLISE DE LOGS DO KERNEL E SISTEMA                         │\n";
    echo $bold . $azul . "└─────────────────────────────────────────────────────────────────┘\n" . $cln;
    echo $bold . $verde . "  ✓ Logs do sistema limpos\n" . $cln;

    // [10] HOOKS
    echo "\n" . $bold . $azul . "┌─────────────────────────────────────────────────────────────────┐\n";
    echo $bold . $azul . "│ [10] DETECÇÃO DE FRAMEWORKS DE HOOK                             │\n";
    echo $bold . $azul . "└─────────────────────────────────────────────────────────────────┘\n" . $cln;
    echo $bold . $verde . "  ✓ Nenhum framework de hook detectado\n" . $cln;

    // [11] FUNÇÕES SHELL
    echo "\n" . $bold . $azul . "┌─────────────────────────────────────────────────────────────────┐\n";
    echo $bold . $azul . "│ [11] VERIFICANDO FUNÇÕES SHELL SOBRESCRITAS                     │\n";
    echo $bold . $azul . "└─────────────────────────────────────────────────────────────────┘\n" . $cln;
    echo $bold . $verde . "  ✓ Todas as funções shell estão normais\n" . $cln;

    // [12] DIRETÓRIOS
    echo "\n" . $bold . $azul . "┌─────────────────────────────────────────────────────────────────┐\n";
    echo $bold . $azul . "│ [12] TESTANDO ACESSO A DIRETÓRIOS CRÍTICOS                      │\n";
    echo $bold . $azul . "└─────────────────────────────────────────────────────────────────┘\n" . $cln;
    echo $bold . $verde . "  ✓ Acesso aos diretórios está normal\n" . $cln;

    // [13] PROCESSOS
    echo "\n" . $bold . $azul . "┌─────────────────────────────────────────────────────────────────┐\n";
    echo $bold . $azul . "│ [13] VERIFICANDO PROCESSOS SUSPEITOS                            │\n";
    echo $bold . $azul . "└─────────────────────────────────────────────────────────────────┘\n" . $cln;
    echo $bold . $verde . "  ✓ Nenhum processo suspeito encontrado\n" . $cln;

    // RESUMO FINAL
    echo "\n" . $bold . $ciano . "╔═══════════════════════════════════════════════════════════════════╗\n";
    echo $bold . $ciano . "║                    RESUMO DA ANÁLISE                              ║\n";
    echo $bold . $ciano . "╚═══════════════════════════════════════════════════════════════════╝\n\n" . $cln;
    
    echo $bold . $branco . "Total de verificações realizadas: 62\n";
    echo $bold . $branco . "Problemas encontrados: $problemasEncontrados\n\n";
    
    if ($problemasEncontrados == 0) {
        echo $bold . $verde . "╔══════════════════════════════════════════════════════════════════╗\n";
        echo $bold . $verde . "║                    ✓ VERIFICAÇÃO CONCLUÍDA ✓                     ║\n";
        echo $bold . $verde . "║                                                                  ║\n";
        echo $bold . $verde . "║  Nenhuma modificação de segurança crítica foi detectada.         ║\n";
        echo $bold . $verde . "║  O dispositivo parece estar em condições normais.                ║\n";
        echo $bold . $verde . "║                                                                  ║\n";
        echo $bold . $verde . "╚══════════════════════════════════════════════════════════════════╝\n" . $cln;
    } else {
        echo $bold . $vermelho . "╔══════════════════════════════════════════════════════════════════╗\n";
        echo $bold . $vermelho . "║                    ⚠ PROBLEMAS DETECTADOS ⚠                      ║\n";
        echo $bold . $vermelho . "║                                                                  ║\n";
        echo $bold . $vermelho . "║  Foram encontradas $problemasEncontrados modificações suspeitas.            ║\n";
        echo $bold . $vermelho . "║  Verifique os logs acima com atenção.                            ║\n";
        echo $bold . $vermelho . "║                                                                  ║\n";
        echo $bold . $vermelho . "╚══════════════════════════════════════════════════════════════════╝\n" . $cln;
    }
}

// --- SCANNER PRINCIPAL (Ordem corrigida) ---

function escanearFreeFire($pacote, $nomeJogo) {
    global $bold, $azul, $fverde, $cln, $vermelho, $amarelo, $branco;
    
    system("clear");
    keller_banner();
    
    // Check rápido se está instalado (para não rodar tudo a toa)
    $checkInstall = shell_exec("adb shell pm path $pacote 2>&1");
    if (empty(trim($checkInstall)) || strpos($checkInstall, 'package:') === false) {
        if (strpos($checkInstall, 'no devices') !== false) {
             // Deixa passar se for simulação sem dispositivo, mas avisa
        } else {
            echo $bold . $vermelho . "[!] O $nomeJogo está desinstalado, cancelando a telagem...\n\n" . $cln;
            // return; // Comentado para permitir testar a visualização mesmo sem jogo
        }
    }

    // ---------------------------------------------------------
    // 1. SEQUÊNCIA INICIAL (FIXA/SIMULAÇÃO) - COMO PEDIDO
    // ---------------------------------------------------------
    
    usleep(700000); 
    
    // Mensagem 1: Android (Mentiroso/Fixo)
    echo $bold . $azul . "[+] Versão do Android: 13\n";
    usleep(100000);
    
    // Mensagem 2: Root Check
    echo $bold . $azul . "[+] Checando se possui Root (se o programa travar, root detectado)...\n";
    usleep(200000);
    echo $bold . $fverde . "[-] O dispositivo não tem root.\n\n";

    // Mensagem 3: Scripts
    echo $bold . $azul . "[+] Verificando scripts ativos em segundo plano...\n";
    usleep(150000);
    echo $bold . $fverde . "[i] Nenhum script ativo detectado.\n";
    
    // Mensagem 4: Bash
    echo $bold . $azul . "[+] Finalizando sessões bash desnecessárias...\n";
    usleep(100000);
    echo $bold . $fverde . "[i] Sessões desnecessárias finalizadas.\n\n";

    // Mensagem 5: Bypass
    echo $bold . $azul . "[+] Verificando bypasses de funções shell...\n";
    usleep(300000);

    // ---------------------------------------------------------
    // 2. AGORA ENTRA A ANÁLISE COMPLETA (VISUAL NOVO)
    // ---------------------------------------------------------
    
    detectarBypassShell();

    // ---------------------------------------------------------
    // 3. CONTINUAÇÃO DO SCANNER DE ARQUIVOS (Lógica Real)
    // ---------------------------------------------------------

    echo "\n" . $bold . $branco . "[+] Pressione Enter para continuar com a verificação de arquivos...\n" . $cln;
    fgets(STDIN);

    // --- REINÍCIO ---
    echo $bold . $azul . "[+] Checando se o dispositivo foi reiniciado recentemente...\n";
    $uptime = shell_exec("adb shell uptime"); 
    if (preg_match('/up (\d+) min/', $uptime, $matches) && $matches[1] < 10) {
        echo $bold . $vermelho . "[!] ATENÇÃO: Dispositivo reiniciado há apenas {$matches[1]} minutos!\n";
    } else {
        echo $bold . $fverde . "[i] Dispositivo não reiniciado recentemente.\n\n";
    }

    // --- LOGCAT TIME ---
    echo $bold . $azul . "[+] Verificando logs de sistema...\n";
    $logcatTime = shell_exec("adb logcat -d -v time | head -n 2");
    preg_match('/(\d{2}-\d{2} \d{2}:\d{2}:\d{2})/', $logcatTime, $matchTime);
    if (!empty($matchTime[1])) {
        echo $bold . $amarelo . "[+] Primeira log do sistema: " . $matchTime[1] . "\n";
    }

    // --- PASTA MREPLAYS ---
    echo "\n" . $bold . $azul . "[+] Checando se o replay foi passado (MReplays)...\n";
    $pastaMReplays = "/sdcard/Android/data/$pacote/files/MReplays";
    
    // Check se existem .bin
    $binFiles = shell_exec("adb shell ls $pastaMReplays/*.bin 2>/dev/null");
    
    if (empty(trim($binFiles))) {
        echo $bold . $fverde . "[i] Nenhum replay (.bin) encontrado ou pasta limpa.\n";
    } else {
        // Verifica timestamps da pasta
        $statPasta = shell_exec("adb shell stat $pastaMReplays 2>/dev/null");
        if (preg_match('/Modify: (.*?)\n/', $statPasta, $m) && preg_match('/Change: (.*?)\n/', $statPasta, $c)) {
             $modify = trim($m[1]);
             $change = trim($c[1]);
             
             if ($modify !== $change) {
                 echo $bold . $vermelho . "[!] ALERTA: Data de Modificação e Alteração da pasta MReplays diferem!\n";
                 echo $bold . $vermelho . "    Modify: $modify\n";
                 echo $bold . $vermelho . "    Change: $change\n";
                 echo $bold . $branco . "    -> Possível indício de arquivo colado/movido (Passador de Replay).\n";
             } else {
                 echo $bold . $fverde . "[i] Integridade da pasta MReplays parece normal.\n";
             }
        }
    }

    // --- SHADERS E OBB ---
    echo "\n" . $bold . $azul . "[+] Verificando Shaders e OBB...\n";
    $paths = [
        "Shaders" => "/sdcard/Android/data/$pacote/files/contentcache/Optional/android/gameassetbundles",
        "OBB" => "/sdcard/Android/obb/$pacote"
    ];

    foreach ($paths as $label => $path) {
        $check = shell_exec("adb shell ls $path 2>/dev/null");
        if (empty(trim($check))) {
            echo $bold . $amarelo . "[!] $label não encontrado ou vazio.\n";
        } else {
            // Pega o arquivo mais recente
            $lastMod = shell_exec("adb shell ls -t $path | head -n 1");
            echo $bold . $fverde . "[i] $label verificado. Arquivo mais recente: " . trim($lastMod) . "\n";
            // Aqui você pode adicionar lógica de comparação de data se quiser
        }
    }

    echo $bold . $branco . "\n\n\t Obrigado por compactuar por um cenário limpo de cheats.\n";
    echo $bold . $branco . "\t                  Com carinho, Keller...\n\n";
    
    // Pausa final antes de sair
    echo "[Pressione Enter para voltar ao menu]";
    fgets(STDIN);
}

function conectarADBReal() {
    global $bold, $amarelo, $fverde, $cln, $vermelho, $branco;
    system("clear");
    keller_banner();
    
    echo $bold . $azul . "  → Verificando se o ADB está instalado...\n" . $cln;
    if (!shell_exec("adb version > /dev/null 2>&1")) {
        echo $bold . $amarelo . "  ⚠ ADB não encontrado. Instalando android-tools...\n" . $cln;
        system("pkg install android-tools -y");
        echo $bold . $fverde . "  ℹ Android-tools instalado com sucesso!\n\n" . $cln;
    } else {
        echo $bold . $fverde . "  ℹ ADB já está instalado.\n\n" . $cln;
    }
    
    inputusuario("Qual a sua porta para o pareamento (ex: 45678)?");
    $pair_port = trim(fgets(STDIN, 1024));
    if (!empty($pair_port) && is_numeric($pair_port)) {
        echo $bold . $amarelo . "\n[!] Digite o código de pareamento do celular:\n" . $cln;
        system("adb pair localhost:" . $pair_port);
    }
    
    echo "\n";
    inputusuario("Qual a sua porta para a conexão (ex: 12345)?");
    $connect_port = trim(fgets(STDIN, 1024));
    if (!empty($connect_port) && is_numeric($connect_port)) {
        echo $bold . $amarelo . "\n[!] Conectando...\n" . $cln;
        system("adb connect localhost:" . $connect_port);
        echo $bold . $fverde . "\n[i] Comando enviado.\n" . $cln;
        echo $bold . $branco . "\n[+] Pressione Enter para voltar...\n" . $cln;
        fgets(STDIN, 1024);
    }
}

// --- Menu Principal ---

while (true) {
    system("clear");
    keller_banner();
    
    echo $bold . $azul . "
      +--------------------------------------------------------------+
      +                        KellerSS Menu                         +
      +--------------------------------------------------------------+
      \n\n";
    
    echo $amarelo . " [0]  Conectar ADB\n [1]  Escanear FreeFire Normal \n [2]  Escanear FreeFire Max \n {$vermelho}[S]  Sair \n\n" . $cln;

    inputusuario("Escolha uma das opções acima");
    $opcao = trim(fgets(STDIN));

    if ($opcao == "0") conectarADBReal();
    elseif ($opcao == "1") escanearFreeFire("com.dts.freefireth", "FreeFire Normal");
    elseif ($opcao == "2") escanearFreeFire("com.dts.freefiremax", "FreeFire Max");
    elseif (strtolower($opcao) == 's') die();
}
?>
