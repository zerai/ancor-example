namespace TaskManagement\Application\Domain {

    uuid TaskId;
    string Title;

    string AssigneeId;
    string Name;
    string Email;

    data Assegnee = { AssigneeId $id, Name $name, Email $email };
}
