# ERP & CRM para Papelaria com Laravel

## Descrição do Projeto

Este projeto consiste em um sistema completo de gerenciamento para papelarias, integrando um **ERP (Enterprise Resource Planning)** e um **CRM (Customer Relationship Management)** em uma única plataforma. Desenvolvido com o framework **Laravel**, o sistema oferece funcionalidades essenciais para o controle de estoque, vendas, clientes, fornecedores, colaboradores e muito mais, além de ferramentas para gestão de relacionamento com o cliente, como leads, oportunidades e atividades.

## Funcionalidades Principais

**ERP:**

* Cadastro de produtos, serviços, clientes, fornecedores, vendedores/colaboradores.
* Gestão de estoque: controle de estoque, movimentação, relatórios de estoque baixo.
* Vendas: registro de vendas, emissão de notas fiscais (opcional), controle de comissões de vendedores.
* Relatórios avançados: vendas por período, produtos mais vendidos, comissões, lucro, etc.
* Integração com sistemas de pagamento: Mercado Pago, PagSeguro e PayPal.
* Dashboard com indicadores de desempenho e gráficos.

**CRM:**

* Gestão de Leads: cadastro, qualificação, acompanhamento.
* Gestão de Oportunidades: criação, acompanhamento do pipeline de vendas, histórico de interações.
* Gestão de Atividades: agendamento de tarefas, acompanhamento de follow-ups, registro de interações com clientes.
* Relatórios do CRM: conversão de leads, desempenho de vendas, etc.
* Integração com o ERP: informações do cliente e histórico de compras acessíveis no CRM.

## Tecnologias Utilizadas

* **Laravel:** Framework PHP para desenvolvimento web.
* **Bootstrap:** Framework front-end para estilização da interface (apenas na página inicial).
* **CSS personalizado:** Estilização das demais páginas do sistema.
* **MySQL:** Banco de dados relacional.
* **Eloquent ORM:** Mapeamento objeto-relacional do Laravel.
* **Bibliotecas de gráficos (ex: Chart.js):** Para visualização de dados.
* **Bibliotecas de relatórios (ex: Laravel Excel, Report Builder):** Para geração de relatórios.
* **SDKs de pagamento (Mercado Pago, PagSeguro, PayPal):** Para integração com gateways de pagamento.

## Instalação

1. Clone o repositório: `git clone https://github.com/seu-usuario/nome-do-repositorio.git`
2. Instale as dependências: `composer install`
3. Configure o arquivo `.env` com as credenciais do banco de dados e APIs de pagamento.
4. Execute as migrations: `php artisan migrate`
5. Gere a chave da aplicação: `php artisan key:generate`

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para abrir issues ou enviar pull requests.

## Licença

Este projeto está licenciado sob a licença MIT - veja o arquivo [LICENSE.md](LICENSE.md) para detalhes.

## Autor

[Seu Nome] - [Seu Perfil do Github]

## Screenshots (opcional)

Adicione algumas screenshots do sistema para mostrar a interface e as funcionalidades.

---
