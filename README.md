## Laravel VueJs Crud application

**Frontend**

Реализованы две страницы : 
1) Страница сотрудников (employee_page) - корневой элемент EmplRoot
2) Страница структуры компании (structure_page) - корневой элемент StructRoot

Использовались библиотеки: vuex, vue-router, bootstrap-vue, axios

**Backend**

БД  - PostgreSQL - 3 таблицы : 
1) должности
2) отделы
3) сотрудники

Добавление элементов реализовано только в таблицу "сотрудники".

Присутствует автоматическое начальное заполнение базы данных (см. database/seeds).

Логика запросов прописана в моделях, результат возвращается через API Resources в контроллеры.

###### P.S.
###### Существует баг с vuex (иногда существует необходимость обновить страницу для корректного отображения данных в таблице после добавления/изменения/удаления сотрудника)
