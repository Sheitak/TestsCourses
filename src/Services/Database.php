<?php

use TestsCourses\Object\Contact;

class Database extends SQLite3
{
    public function __construct()
    {
        SQLite3::__construct('../../../../mysqlitedb.db', SQLITE3_OPEN_READWRITE | SQLITE3_OPEN_CREATE, "");
    }

    public function resetTable(): void
    {
        $this->prepare('DROP TABLE if exists contact')->execute();

        $this->prepare('
            CREATE TABLE if not exists contact(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                firstname TEXT NOT NULL,
                lastname TEXT NOT NULL
            )
        ')->execute();
    }

    public function createContact(Contact $contact): bool|array
    {
        $stmt = $this->prepare('INSERT INTO contact(firstname, lastname) VALUES (:firstname, :lastname)');
        $stmt->bindValue(':firstname', $contact->getFirstname(), SQLITE3_TEXT);
        $stmt->bindValue(':lastname', $contact->getLastname(), SQLITE3_TEXT);

        return $stmt->execute()->fetchArray(SQLITE3_ASSOC);
    }

    public function updateContact(Contact $contact, int $id): bool|array
    {
        $stmt = $this->prepare('UPDATE contact SET firstname=:firstname, lastname=:lastname WHERE id=:id');
        $stmt->bindValue(':firstname', $contact->getFirstname(), SQLITE3_TEXT);
        $stmt->bindValue(':lastname', $contact->getLastname(), SQLITE3_TEXT);
        $stmt->bindValue(':id', $id, SQLITE3_TEXT);

        return $stmt->execute()->fetchArray(SQLITE3_ASSOC);
    }
}
