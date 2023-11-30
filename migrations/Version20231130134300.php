<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231130134300 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__courses AS SELECT id, category_id, title, description, duration, difficulty, created_at, update_at FROM courses');
        $this->addSql('DROP TABLE courses');
        $this->addSql('CREATE TABLE courses (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, description CLOB NOT NULL, duration INTEGER NOT NULL, difficulty VARCHAR(25) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , updated_at DATETIME NOT NULL, img VARCHAR(255) NOT NULL, CONSTRAINT FK_A9A55A4C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON UPDATE NO ACTION ON DELETE NO ACTION NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO courses (id, category_id, title, description, duration, difficulty, created_at, updated_at) SELECT id, category_id, title, description, duration, difficulty, created_at, update_at FROM __temp__courses');
        $this->addSql('DROP TABLE __temp__courses');
        $this->addSql('CREATE INDEX IDX_A9A55A4C12469DE2 ON courses (category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TEMPORARY TABLE __temp__courses AS SELECT id, category_id, title, description, duration, difficulty, created_at, updated_at FROM courses');
        $this->addSql('DROP TABLE courses');
        $this->addSql('CREATE TABLE courses (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, category_id INTEGER DEFAULT NULL, title VARCHAR(255) NOT NULL, description CLOB NOT NULL, duration INTEGER NOT NULL, difficulty VARCHAR(25) NOT NULL, created_at DATETIME NOT NULL --(DC2Type:datetime_immutable)
        , update_at DATETIME NOT NULL, CONSTRAINT FK_A9A55A4C12469DE2 FOREIGN KEY (category_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('INSERT INTO courses (id, category_id, title, description, duration, difficulty, created_at, update_at) SELECT id, category_id, title, description, duration, difficulty, created_at, updated_at FROM __temp__courses');
        $this->addSql('DROP TABLE __temp__courses');
        $this->addSql('CREATE INDEX IDX_A9A55A4C12469DE2 ON courses (category_id)');
    }
}
