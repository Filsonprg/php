# MySQL driver + UML

## INFO
- Tato třída používá rozhraní IDB a implementuje jeho metody connect, select, insert, update a delete.

### METODY
- connect, select, insert, update a delete.

### Použití
- connect vytvoří připojení k databázi MySQL a vrátí objekt třídy. Metoda select provede dotaz na databázi a vrátí výsledky ve formě pole asociativních polí. Metoda insert vloží data do zadané tabulky a vrátí true, pokud se vložení podaří. Metoda update aktualizuje záznam s daným id v zadané tabulce s danými daty a vrátí true. Metoda delete smaže záznam s daným id zadané tabulky a vrátí true, pokud smazání bude úspěšné.
