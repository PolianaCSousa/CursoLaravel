LAYOUTS COM BLADE
Os layouts que são criados, devem ficar dentro de uma pasta chamada layout e esta pasta deve estar dentro da pasta views, pois o layout, nada mais é que um view com conteúdo dinâmico e que é extendida para outras views.
A(s) views(s) que será(ão) o layout, contém a diretiva @yield, que é onde será substituído por algum código.

Colocamos entao no layout o codigo padrao (layout padrão) que queremos extender para outras views
As views que terão o mesmo layout, vao extender o layout desejado com a diretiva @extends('nome do layout') e nas diretivas de @section() colocarão ou delimitarão o conteúdo que será substituído no trecho de código que foi extendido. 
