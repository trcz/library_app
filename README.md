# library_app
Library management application for IT studies project

# Krótki przewodnik po strukturze projektu
- Controllery znajdują się pod ścieżką /src/Controller/ 
  - Każdy kontroler dotyczy jednego obrębu zagadnień (UserController dotyczy rzeczy związanych z kontem użytkownika itp, DzieloController   dotyczy rzeczy związanych z dziełami np wyświetlanie ich, dodawanie itp)
- Template'y znajdują się pod ścieżką /templates
  - Template jest to widok (zrobiony w takim lepszym HTML'u), który metoda kontrollera ma zwracać (renderować) po wykonaniu się. 
  
# Najważniejsze informacje:
- Każda metoda w kontrolerze musi posiadać:
  - Route - czyli ścieżka na której metoda zostaje wywoływana np. użytkownik wchodząc na www.test.pl/produkty ma mieć wyświetlone na ekranie wszystkie produkty sklepu, to nad naszą metoda powinno się znaleźć: [Route](https://github.com/trcz/library_app/blob/master/route.PNG)
  
