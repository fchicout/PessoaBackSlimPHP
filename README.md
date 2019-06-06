# PessoaBackSlimPHP
CRUD de exemplo com o SlimFramework


|metodo| /pessoa (Conjunto) | /pessoa (Individual) | 
|--|--|--|
| | RetCode - Description | RetCode - Description |
| *GET* | 200 - Recupera todos os registros de pessoas da base de dados  | 200 - Recupera um indivíduo com o id dado |
| | 204 - Sucesso na busca. Sem dados para retornar  | 404 - id passado não existe |
| *POST* | 200 - Devolve o próximo ID para inserção de usuário | 201 - Insere um indívíduo (dados no RequestBody) |
| |  | 400 - Dados incompletos |
| |  | 409 - Conflito de dados |
| *PUT* | 405 - Não permitido | 200 - Atualização feita com sucesso, com retorno |
| | | 204 - Atualização feita com sucesso, sem retorno |
| | | 404 - Não encontrado |
| *PATCH* | 405 - Não permitido | 200 - Atualização feita com sucesso, com retorno |
| | | 204 - Atualização feita com sucesso, sem retorno |
| | | 404 - Não encontrado |
| *DELETE* | 405 - Não permitido | 200 - Atualização feita com sucesso, com retorno |
| | | 204 - Atualização feita com sucesso, sem retorno |
| | | 404 - Não encontrado |