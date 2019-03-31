<table class="table table-striped bordergray">
    <?php // print_r($complaint_data); ?>
    <tr>
        <th>complain #</th>
        <td><?php print_r($complaint_data['id']); ?></td>
        <th>complain type</th>
        <td><?php print_r($complaint_data['complaint_type']); ?></td>
    </tr>
    <tr>
        <th>source</th>
        <td><?php print_r($complaint_data['source']); ?></td>
        <th>name</th>
        <td><?php print_r($complaint_data['name']); ?></td>
    </tr>

    <tr>
        <th>phone</th>
        <td><?php print_r($complaint_data['contact']); ?></td>
        <th>date</th>
        <td><?php print_r($complaint_data['date']); ?></td>
    </tr>
    <tr>
        <th>Description</th>
        <td><?php print_r($complaint_data['description']); ?></td>
        <th>action_taken</th>
        <td><?php print_r($complaint_data['action_taken']); ?></td>
    </tr>
    <tr>
        <th>assigned</th>
        <td><?php print_r($complaint_data['assigned']); ?></td>
        <th>note</th>
        <td><?php print_r($complaint_data['note']); ?></td>
    </tr>
</tbody>
</table>