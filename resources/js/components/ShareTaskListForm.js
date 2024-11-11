import React, { useState } from 'react';
import { shareTaskList } from '../../services/api';

function ShareTaskListForm() {
  const [taskListId, setTaskListId] = useState('');
  const [username, setUsername] = useState('');

  const handleSubmit = async (e) => {
    e.preventDefault();

    if (!taskListId || !username) {
      console.error('Please provide both task list ID and username');
      return;
    }

    await shareTaskList(taskListId, username);
  };

  return (
    <form onSubmit={handleSubmit}>
      <div>
        <label htmlFor="taskListId">Task List ID</label>
        <input
          type="text"
          id="taskListId"
          value={taskListId}
          onChange={(e) => setTaskListId(e.target.value)}
          required
        />
      </div>
      <div>
        <label htmlFor="username">Recipient Username</label>
        <input
          type="text"
          id="username"
          value={username}
          onChange={(e) => setUsername(e.target.value)}
          required
        />
      </div>
      <button type="submit">Share Task List</button>
    </form>
  );
}

export default ShareTaskListForm;
