<?php declare(strict_types = 1);

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180325183216 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE student (id VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE mark DROP CONSTRAINT fk_6674f27123edc87');
        $this->addSql('DROP INDEX idx_6674f27123edc87');
        $this->addSql('ALTER TABLE mark DROP student');
        $this->addSql('ALTER TABLE mark RENAME COLUMN subject_id TO student_id');
        $this->addSql('ALTER TABLE mark ADD CONSTRAINT FK_6674F271CB944F1A FOREIGN KEY (student_id) REFERENCES student (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_6674F271CB944F1A ON mark (student_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE mark DROP CONSTRAINT FK_6674F271CB944F1A');
        $this->addSql('DROP TABLE student');
        $this->addSql('DROP INDEX IDX_6674F271CB944F1A');
        $this->addSql('ALTER TABLE mark ADD student VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE mark RENAME COLUMN student_id TO subject_id');
        $this->addSql('ALTER TABLE mark ADD CONSTRAINT fk_6674f27123edc87 FOREIGN KEY (subject_id) REFERENCES subject (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_6674f27123edc87 ON mark (subject_id)');
    }
}
