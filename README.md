# zf3-mvc-layout-manager

**Gerenciador de Layout para módulos em ZF3.**


Se você tiver um aplicativo modular, cada módulo pode possuir um layout diferente.

Normalmente **Login** e **Dashboard** deve compor CSS e JavaScript diferentes e separados.

Atualmente, isso não é suportado por padrão no zendframework.

Este pacote permitirá que você defina layout's diferentes para módulos diferentes.

## Instalando

Execute em seu terminal o comando abaixo:

``` composer require sergiohermes/zf3-mvc-layout-manager ```

Adicione  ** config/modules.config.php **:

```
"modules" => [
    "ZF3LayoutManager"
],
```


## Como utilizar:

Em cada modulo por padrão existe o arquivo **module.config.php** que possui esta configuração de **view_manager**.

```
'view_manager' => [
    'display_not_found_reason' => true,
    'display_exceptions'       => true,
    'doctype'                  => 'HTML5',
    'not_found_template'       => 'error/404',
    'exception_template'       => 'error/index',
    'template_map' => [
        'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
        'error/404'               => __DIR__ . '/../view/error/404.phtml',
        'error/index'             => __DIR__ . '/../view/error/index.phtml',
    ],
    'template_path_stack' => [
        __DIR__ . '/../view',
    ],
],

```

Este módulo não força você a fugir do padrão referenciado atráves do "Listener" uma escuta do evento **manageLayoutForModule** que está no arquivo **Layout.php**

Logo se você precisa alterar o **template_map** da view_manager, sinta-se a vontade em colocar o valor que você precisa, lembrando que a chave também pode ser alterada, mas gera uma manutenção desapropriada com a finalidade deste recurso. Então reutilize o quanto for adequado.

## Configuração

Zend Framework possui uma configuração explicita, ou seja, se você não configurar valores ele define atributos padronizados do framework.

Então vamos configurar :neckbeard:

Crie um arquivo nas configurações globais do seu projeto.
Normalmente localizado em **config/autoload** chamado **layout.global.php** ou copie o arquivo **config/zf3-mvc-layout-manager.php.dist**.

Vamos supor que eu tenha 3 módulos em minha aplicação ** Admin, Dashboard e Login** a configuração ficará como abaixo:

# GLOBAL CONFIG

```
'module_layouts' => [
    'Admin' => 'layout/admin-layout',
    'Dashboard' => 'layout/dashboard-layout',
    'Login' => 'layout/login-layout',

],

```
# LOCAL CONFIG

## Módulo ADMIN

Em cada modulo por padrão existe o arquivo **module.config.php** que possui esta configuração de **view_manager**.

```
'view_manager' => [
    'display_not_found_reason' => true,
    'display_exceptions'       => true,
    'doctype'                  => 'HTML5',
    'not_found_template'       => 'error/404',
    'exception_template'       => 'error/index',
    'template_map' => [
        //'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        'layout/admin-layout'           => __DIR__ . '/../view/layout/layout.phtml',
        'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
        'error/404'               => __DIR__ . '/../view/error/404.phtml',
        'error/index'             => __DIR__ . '/../view/error/index.phtml',
    ],
    'template_path_stack' => [
        __DIR__ . '/../view',
    ],
],

```


## Módulo Dashboard

Em cada modulo por padrão existe o arquivo **module.config.php** que possui esta configuração de **view_manager**.

```
'view_manager' => [
    'display_not_found_reason' => true,
    'display_exceptions'       => true,
    'doctype'                  => 'HTML5',
    'not_found_template'       => 'error/404',
    'exception_template'       => 'error/index',
    'template_map' => [
        //'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        'layout/dashboard-layout'           => __DIR__ . '/../view/layout/layout.phtml',
        'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
        'error/404'               => __DIR__ . '/../view/error/404.phtml',
        'error/index'             => __DIR__ . '/../view/error/index.phtml',
    ],
    'template_path_stack' => [
        __DIR__ . '/../view',
    ],
],

```


## Módulo Login

Em cada modulo por padrão existe o arquivo **module.config.php** que possui esta configuração de **view_manager**.

```
'view_manager' => [
    'display_not_found_reason' => true,
    'display_exceptions'       => true,
    'doctype'                  => 'HTML5',
    'not_found_template'       => 'error/404',
    'exception_template'       => 'error/index',
    'template_map' => [
        //'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        'layout/login-layout'           => __DIR__ . '/../view/layout/layout.phtml',
        'error/404'               => __DIR__ . '/../view/error/404.phtml',
        'error/index'             => __DIR__ . '/../view/error/index.phtml',
    ],
    'template_path_stack' => [
        __DIR__ . '/../view',
    ],
],

```


Perceba que você pode usar **layout/layout** , e na verdade eu uso assim mas acredito que para titulo de tutorial você irá entender melhor como a mágica funciona.

Feliz natal e ano novo!
