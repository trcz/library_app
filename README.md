# library_app
Library management application for IT studies project
# Do zrobienia:
  - [ ] Poprawienie diagramu klas
  - [ ] Usunięcie interfejsu z diagramu klas i wpisanie metod z tego interfejsu po prostu do każdej klasy która po nim dziedziczyła je
  - [ ] Poprawienie diagramu interfejsu i dodanie interfejsów (stron) dostępnych dla administratora (takie jak np. strona dodawania pokoju itp.)
  - [ ] Zaprojektowanie UI (proponuję zacząć od menu nawigacyjnego, które będzie na górze strony, może coś takiego [BootStrap navbar](https://www.tutorialrepublic.com/codelab.php?topic=bootstrap&file=navbar-color-schemes))
  - [ ] Backend do każdego widoku (napisanie metod w kontrolerach)
  - [ ] Frontend do każdego widoku (napisanie template'ów w html.twig)
# Krótki przewodnik po strukturze projektu
- Controllery znajdują się pod ścieżką /src/Controller/ 
  - Każdy kontroler dotyczy jednego obrębu zagadnień (UserController dotyczy rzeczy związanych z kontem użytkownika itp, DzieloController   dotyczy rzeczy związanych z dziełami np wyświetlanie ich, dodawanie itp)
- Template'y znajdują się pod ścieżką /templates
  - Template jest to widok (zrobiony w takim lepszym HTML'u), który metoda kontrollera ma zwracać (renderować) po wykonaniu się. 
  
# Najważniejsze informacje:
- Każda metoda w kontrolerze musi posiadać:
  - Route - czyli ścieżka na której metoda zostaje wywoływana np. użytkownik wchodząc na www.test.pl/produkty ma mieć wyświetlone na ekranie wszystkie produkty sklepu, to nad naszą metoda powinno się znaleźć: ![Route](https://github.com/trcz/library_app/blob/master/route.PNG)
  - template - każda metoda musi zwracać template czyli widok który wyświetli się użytkownikowi. w składni funkci render(), pierwszym argumentem jest ścieżka do naszego template'a, zaś drugim jest tablica zmiennych znajdująca się w nawiasach kwadratowych. Gdzie po lewej stronie mamy nazwę tej zmiennej DO UŻYCIA W TEMPLACIE, a po prawej nazwe zmiennej z danej metody. Przykładowo: ![Template](https://github.com/trcz/library_app/blob/master/template.PNG)
  
  
 # Ważne linki:
   - [Symfony dokumentacja](https://symfony.com/doc/current/index.html#gsc.tab=0) - po lewej stronie mamy menu Getting started i tam wszystko jest ładnie opisane.
   - [Moje repozytorium](https://github.com/YaggiDev/Symfony-4-Online-Store) - powinno Wam pomóc zaciągnąć jakieś wzorce.
   - [Twig instrukcja](https://twig.symfony.com/doc/2.x/templates.html) - pomoc jak template w twigu tworzyć
