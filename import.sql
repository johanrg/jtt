insert into translation (id, resourceId, languageId, userId, externalIdentifier, revision, text, updated, created, stamped)
select id, resourceId, languageId, editor, externalId, revision, translatedText, newText, created, stamped from translations2

insert into translation (resourceId, languageId, userId, externalIdent, revision, text, updated, created, stamped)
select '11', lid, '5', question_id, 1, question, 0, '2017-11-07', stamped from questionlist_orig
