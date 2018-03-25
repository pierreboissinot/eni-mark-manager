<?php declare(strict_types = 1);

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180325130833 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE subject (id VARCHAR(255) NOT NULL, domain_id VARCHAR(255) DEFAULT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FBCE3E7A115F0EE5 ON subject (domain_id)');
        $this->addSql('CREATE TABLE domain (id VARCHAR(255) NOT NULL, label VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE subject ADD CONSTRAINT FK_FBCE3E7A115F0EE5 FOREIGN KEY (domain_id) REFERENCES domain (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE mark ADD subject_id VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE mark DROP domain');
        $this->addSql('ALTER TABLE mark ADD CONSTRAINT FK_6674F27123EDC87 FOREIGN KEY (subject_id) REFERENCES subject (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_6674F27123EDC87 ON mark (subject_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE mark DROP CONSTRAINT FK_6674F27123EDC87');
        $this->addSql('ALTER TABLE subject DROP CONSTRAINT FK_FBCE3E7A115F0EE5');
        $this->addSql('DROP TABLE subject');
        $this->addSql('DROP TABLE domain');
        $this->addSql('DROP INDEX IDX_6674F27123EDC87');
        $this->addSql('ALTER TABLE mark ADD domain VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE mark DROP subject_id');
    }
}
