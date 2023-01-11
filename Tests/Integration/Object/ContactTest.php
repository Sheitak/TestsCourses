<?php

use PHPUnit\Framework\TestCase;
use TestsCourses\Object\Contact;

class ContactTest extends TestCase
{
    protected Database $database;

    protected function setUp(): void
    {
        $this->database = new Database();
    }

    public function testCreateContact(): void
    {
        $this->database->resetTable();

        $countBeforeInsert = $this->database->querySingle("SELECT COUNT(*) as count FROM contact");

        $contact = new Contact("John", "Doe");
        $this->database->createContact($contact);

        $johnDoe = $this->database->prepare("
            SELECT * FROM contact WHERE firstname = 'John' AND lastname = 'Doe'
        ")->execute()->fetchArray(SQLITE3_ASSOC);

        $countAfterInsert = $this->database->querySingle("SELECT COUNT(*) as count FROM contact");

        $this->assertEquals($contact->getFirstname(), $johnDoe["firstname"]);
        $this->assertEquals($contact->getLastname(), $johnDoe["lastname"]);

        $this->assertEquals(
            $countBeforeInsert + 2,
            $countAfterInsert
        );
    }

    public function testUpdateContact(): void
    {
        $this->database->resetTable();

        $contact = new Contact("John", "Doe");
        $this->database->createContact($contact);

        $oldJohnDoe = $this->database->prepare("
            SELECT * FROM contact WHERE firstname = 'John' AND lastname = 'Doe'
        ")->execute()->fetchArray(SQLITE3_ASSOC);

        $new = new Contact("Primary", "Doez");
        $this->database->updateContact($new, $oldJohnDoe["id"]);

        $newJohnDoe = $this->database->prepare("
            SELECT * FROM contact WHERE firstname = 'Primary' AND lastname = 'Doez'
        ")->execute()->fetchArray(SQLITE3_ASSOC);

        $this->assertEquals($oldJohnDoe["id"], $newJohnDoe["id"]);
        $this->assertEquals($newJohnDoe["firstname"], $new->getFirstname());
        $this->assertEquals($newJohnDoe["lastname"], $new->getLastname());
    }

//    public function testReadContact() {
//
//    }
//
//    public function testDeleteContact() {
//
//    }
}
