<?php
return
    [
        'sem_alteracao' => ['class' => 'info', 'text' => '<strong>Nada</strong> para alterar'],
        'sucesso' => ['class' => 'success', 'text' => '<strong>Feito!</strong> <hr> Operação realizada com sucesso.'],
        'deleted_ok' => ['class' => 'success', 'text' => '<strong>Feito!</strong> <hr> Registro excluído com sucesso.'],
        'deleted_error' => ['class' => 'danger', 'text' => '<strong>Erro!</strong> <hr> O registro não foi excluído.'],
        'upload_parcial' => ['class' => 'info', 'text' => 'Operação realizada, mas nem todos os arquivos foram enviados'],
        'erro' => ['class' => 'danger', 'text' => 'Ocorreu um erro, Acione um administrador'],
        'close_error' => ['class' => 'danger', 'text' => 'Ocorreu um erro, Não foi possível finalizar a tarefa'],
        'erro_arquivo_permissoes' => ['class' => 'danger', 'text' => 'Houve erro ao escrever o arquivo de permissões'],
        'erro_upload'           => ['class' => 'danger', 'text' => 'O arquivo não foi enviado'],
        'erro_exclusao_arquivo' => ['class' => 'info', 'text' => 'Nenhum arquivo foi excluído, verifique se o arquivo existe no diretório'],
        'arquivo_cache_exp_email' => ['class' => 'warning', 'text' => ' Configurações do <strong>arquivo</strong> de exportação precisaram ser atualizadas, <strong>tente novamente agora.</strong> Se o erro persistir fale com um adminsitrador.'],
        'arquivo_cache_exp_clientes' => ['class' => 'warning', 'text' => ' Configurações do <strong>arquivo</strong> de exportação de clientes precisaram ser atualizadas, <strong>tente novamente agora.</strong> Se o erro persistir fale com um adminsitrador.'],
        'arquivo_config_relatorio' => ['class' => 'danger', 'text' => ' Configurações do <strong>arquivo</strong> de relatório precisaram ser atualizadas, <strong>tente novamente agora.</strong> Se o erro persistir fale com um adminsitrador.'],
        'permissao_negada'           => ['class' => 'danger', 'text' => 'Você não tem permissão para editar este registro'],
        'senha_n_confere'           => ['class' => 'danger', 'text' => 'Verifique sua senha atual'],
        'edicao_negada'           => ['class' => 'danger', 'text' => 'Você (admin), só pode alterar seu próprio registro'],
    ];
