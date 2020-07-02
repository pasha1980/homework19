<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200702063000 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql("create trigger insert_log after insert on users
    for each row begin
        insert into logs set action='create', new_data=json_object('id', new.id, 'email', new.email, 'name', new.name, 'password', new.password);
    end;");

        $this->addSql("create trigger update_log after update on users
    for each row begin
        insert into logs set action='update', old_data=json_object('id', old.id, 'email', old.email, 'name', old.name, 'password', old.password), new_data=json_object('id', new.id, 'email', new.email, 'name', new.name, 'password', new.password);
    end;");

        $this->addSql("create trigger delete_log after delete on users
    for each row begin
        insert into logs set action='delete', old_data=json_object('id', old.id, 'email', old.email, 'name', old.name, 'password', old.password);
    end;");

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs

    }
}
